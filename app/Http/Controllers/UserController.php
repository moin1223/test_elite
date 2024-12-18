<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserType;
use App\Models\AssignUser;
use App\Models\AuthorizedPartne;
use App\Models\District;
use Illuminate\Http\Request;
use App\Models\RequestedUser;
use App\Models\UserDetails;
use App\Models\UserEditRequest;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserDataRepository;
use Spatie\Permission\Models\Role;
use Exception;
use Xenon\LaravelBDSms\Provider\Mobireach;
use Xenon\LaravelBDSms\Sender;

class UserController extends Controller
{

    public function index(Request $request)
    {

        if ($request->district == 'Select District') {
            return redirect()->back()->with('message', 'please select district');
        }
        // dd($request->district);
        // $request->validate([
        //     'district' => ['required'],


        // ]);
        $districts = District::all();
        $districtName = $request->input('district');

        $usersQuery = UserDetails::with('user', 'district')->where('role', 'user');

        if ($districtName) {
            $usersQuery->whereHas('district', function ($query) use ($districtName) {
                $query->where('name', 'like', '%' . $districtName . '%');
            });
        }

        $users = $usersQuery->paginate(100)->appends($request->all());
        // dd($users);
        return view('website.user.list', compact('users', 'districts'));
    }
    public function show(User $user)
    {
        // dd($user);
        // $user = User::findOrfail($user); 
        $userDetails = UserDetails::with('division', 'district', 'thana', 'group')->where('user_id', $user->id)->firstOrfail();
        // dd($userDetails);
        return view('website.user.show', compact('user', 'userDetails'));
    }
    public function destroy(UserDetails $user)
    {
        // if ($user->role == 'seller') {
        //     $requestedUser = RequestedUser::where('mobile_number', $user->mobile_number)->firstOrfail();
        //     $requestedUser->delete();
        // }
        $userDelete = User::findOrfail($user->user_id);
        $userDelete->delete();
        $UesrDetailsDelete = $user->delete();

        return redirect()->back()->with(['message' => 'User deleted successfully', 'alert-type' => 'success']);
    }

    public function getRequestedUserDetails()
    {
        $user_id = request('user_id');
        $requestedUser = RequestedUser::with('division', 'district', 'thana', 'group')->findOrfail($user_id);
        return response()->json($requestedUser);
    }
    public function acceptUserRegisterRequest(Request $request)
    {
        $requestedUser = RequestedUser::findOrfail($request->user_id);

        $user = User::create([
            'first_name' => $requestedUser->first_name,
            'last_name' => 'test',
            'email' => $requestedUser->email,
            'password' => $requestedUser->password,
        ]);
        UserDetails::create([
            'gender' => $requestedUser->gender,
            'division_id' => $requestedUser->division_id,
            'district_id' => $requestedUser->district_id,
            'thana_id' => $requestedUser->thana_id,
            'ward_no' => $requestedUser->ward_no,
            'group_id' => $requestedUser->group_id,
            'mobile_number' => $requestedUser->mobile_number,
            'whats_app_number' => $requestedUser->whats_app_number,
            'monitor_name' => $requestedUser->monitor_name,
            'monitor_number' => $requestedUser->monitor_number,
            'drector_name' => $requestedUser->drector_name,
            'director_number' => $requestedUser->director_number,
            'role' => $requestedUser->role,
            'user_id' => $user->id,
        ]);
        $role = Role::where('name', $requestedUser->role)->first();

        if ($role) {
            $user->assignRole($role);
        }
        $user->notify(new EmailNotification());
        // try {
        //     $sender = Sender::getInstance();
        //     $sender->setProvider(Mobireach::class);
        //     $sender->setMobile('8801840010215');
        //     $sender->setMessage('helloooooooo boss!');
        //     $sender->setConfig(
        //         [
        //             'Username' => 'elitecor',
        //             'Password' => '3Kaieschy-78',
        //             'From' => 'Elite Corpo'
        //         ]
        //     );
        //     $status = $sender->send();
        // } catch (Exception $e) {

        //     echo 'Error: ' . $e->getMessage();
        // }
      $requestedUser->delete();
        return redirect()->back()->with(['message' => 'User Register Request Accepted', 'alert-type' => 'success']);
    }
    public function cancelUserRegisterRequest($id)
    {
        $requestedUser = RequestedUser::findOrfail($id);
        $requestedUser->delete();
        return redirect()->back()->with(['message' => 'User Register Request Cancel', 'alert-type' => 'success']);
    }
    public function requestedUser(Request $request)
    {
        $requestedUsers = RequestedUser::with('district', 'group')->where('status', 0)->get();
        // dd($requestedUsers);
        if ($request->group == 'Select group' && $request->district == 'Select District') {
            return redirect()->back()->with('message', 'please select group or district');
        }

        $districts = District::all();
        $groups = AuthorizedPartne::all();
        $districtName = $request->input('district');
        $groupName = $request->input('group');

        $usersQuery = RequestedUser::with('district', 'group')->where('status', 0);

        if ($districtName && $groupName) {
            $usersQuery->where(function ($query) use ($districtName, $groupName) {
                $query->whereHas('district', function ($subQuery) use ($districtName) {
                    $subQuery->where('name', 'like', '%' . $districtName . '%');
                })->orWhereHas('group', function ($subQuery) use ($groupName) {
                    $subQuery->where('name', 'like', '%' . $groupName . '%');
                });
            });
        } elseif ($districtName) {
            $usersQuery->whereHas('district', function ($query) use ($districtName) {
                $query->where('name', 'like', '%' . $districtName . '%');
            });
        } elseif ($groupName) {
            $usersQuery->whereHas('group', function ($query) use ($groupName) {
                $query->where('name', 'like', '%' . $groupName . '%');
            });
        }

        $requestedUsers = $usersQuery->paginate(100)->appends($request->all());
        return view('website.user.requested-user-list', compact('requestedUsers', 'districts', 'groups'));
    }
    public function getSellerList(Request $request)
    {

        if ($request->group == 'Select group' && $request->district == 'Select District') {
            return redirect()->back()->with('message', 'please select group or district');
        }

        $districts = District::all();
        $groups = AuthorizedPartne::all();
        $districtName = $request->input('district');
        $groupName = $request->input('group');

        $usersQuery = UserDetails::with('user', 'district', 'group')->where('role', 'seller');

        if ($districtName && $groupName) {
            $usersQuery->where(function ($query) use ($districtName, $groupName) {
                $query->whereHas('district', function ($subQuery) use ($districtName) {
                    $subQuery->where('name', 'like', '%' . $districtName . '%');
                })->orWhereHas('group', function ($subQuery) use ($groupName) {
                    $subQuery->where('name', 'like', '%' . $groupName . '%');
                });
            });
        } elseif ($districtName) {
            $usersQuery->whereHas('district', function ($query) use ($districtName) {
                $query->where('name', 'like', '%' . $districtName . '%');
            });
        } elseif ($groupName) {
            $usersQuery->whereHas('group', function ($query) use ($groupName) {
                $query->where('name', 'like', '%' . $groupName . '%');
            });
        }

        $users = $usersQuery->paginate(100)->appends($request->all());
        return view('website.user.seller-list', compact('users', 'districts', 'groups'));
    }
}
