<!-- Styles for Footer and Social Media Links -->
<style>
  .footer-bg {
      background-color: #343a40; /* Adjust background color as needed */
  }
  .social-links {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
  }
  .social-title {
      font-size: 1.2rem;
      color: #fff;
      margin-bottom: 10px;
  }
  .social-link-wrapper {
      display: flex;
      gap: 15px;
  }
  .social-link {
      color: #fff;
      font-size: 1.5rem;
      padding: 10px;
      width: 45px;
      height: 45px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%; /* Makes the icons circular */
      transition: background-color 0.3s ease;
  }
  .social-link.facebook {
      background-color: #3b5998;
  }
  .social-link.facebook:hover {
      background-color: #2d4373;
  }
  .social-link.youtube {
      background-color: #FF0000;
  }
  .social-link.youtube:hover {
      background-color: #cc0000;
  }
</style>

<!-- Bootstrap Icons CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
<footer class="container text-white footer-bg mt-2">
  <!-- Seller Sign Up Button -->
  <a href="{{ route('seller-register') }}" class="btn btn-secondary mt-3 ms-3 dropbtn-bg">Seller Sign Up</a>
  
  <!-- Help Section Title -->
  <h4 class="text-uppercase pt-3 text-center">Help</h4>
  
  <!-- Contact Information -->
  <p class="text-center pb-2">
    CONTACT US: 
    <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox" class="text-white">elitecorporation@elitecorpo.com</a>
  </p>
  
  <!-- Social Media Links Section -->
  <div class="social-links pb-3">
    <!-- Social Media Title -->
    <div class="social-title">Our Social Media Link</div>
    
    <!-- Social Media Icons -->
    <div class="social-link-wrapper">
      <!-- Facebook Link -->
      <a href="https://web.facebook.com/elitebdforangels?rdid=PfjEQvLDxz8BbuKt&share_url=https%3A%2F%2Fweb.facebook.com%2Fshare%2F3GsAomT5FrJYA9vm%2F%3F_rdc%3D1%26_rdr#" class="social-link facebook" target="_blank" aria-label="Facebook">
        <i class="bi bi-facebook"></i>
      </a>
      
      <!-- YouTube Link -->
      <a href="https://www.youtube.com/@elitecorporationofficial" class="social-link youtube" target="_blank" aria-label="YouTube">
        <i class="bi bi-youtube"></i>
      </a>
    </div>
  </div>
</footer>
