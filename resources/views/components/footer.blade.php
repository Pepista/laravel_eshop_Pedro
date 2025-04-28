<!-- resources/views/components/footer.blade.php -->
<footer class="bg-gray-900 text-white py-8 mt-16">
  <div class="container mx-auto text-center lg:text-left">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

          <!-- Section 1: Logo and Branding -->
          <div class="mb-6">
              <img src="/path-to-your-logo.png" alt="My Shop" class="mx-auto lg:mx-0 h-12 mb-4">
              <p class="text-gray-400 text-sm">Objevte kvalitní produkty pro každý den v našem obchodě.</p>
          </div>

          <!-- Section 2: Contact Info -->
          <div class="mb-6">
              <h3 class="text-lg font-semibold text-white mb-2">Kontakt</h3>
              <p class="text-sm text-gray-400 mb-2"><strong>Adresa:</strong> Náměstí 123, 760 01 Zlín, Česká republika</p>
              <p class="text-sm text-gray-400 mb-2"><strong>Telefon:</strong> +420 123 456 789</p>
              <p class="text-sm text-gray-400">
                  <strong>Email:</strong> 
                  <a href="mailto:info@myshop.cz" class="text-green-500 hover:text-green-300">info@myshop.cz</a>
              </p>
          </div>

          <!-- Section 3: Social Media Links -->
          <div class="mb-6">
              <h3 class="text-lg font-semibold text-white mb-2">Sociální sítě</h3>
              <div class="flex justify-center lg:justify-start">
                  <a href="#" class="text-gray-400 hover:text-green-500 mx-2">
                      <i class="fab fa-facebook-f"></i> Facebook
                  </a>
                  <a href="#" class="text-gray-400 hover:text-green-500 mx-2">
                      <i class="fab fa-twitter"></i> Twitter
                  </a>
                  <a href="#" class="text-gray-400 hover:text-green-500 mx-2">
                      <i class="fab fa-instagram"></i> Instagram
                  </a>
              </div>
          </div>

          <!-- Section 4: Footer Navigation Links -->
          <div class="mb-6">
              <h3 class="text-lg font-semibold text-white mb-2">Navigace</h3>
              <div class="flex justify-center lg:justify-start">
                  <a href="#" class="text-gray-400 hover:text-green-500 mx-2 text-sm">Privacy Policy</a>
                  <a href="#" class="text-gray-400 hover:text-green-500 mx-2 text-sm">Terms of Service</a>
                  <a href="#" class="text-gray-400 hover:text-green-500 mx-2 text-sm">FAQ</a>
              </div>
          </div>

      </div>

      <!-- Copyright Section -->
      <div class="text-center mt-6">
          <p class="text-sm text-gray-400">&copy; {{ date('Y') }} My Shop. All rights reserved.</p>
      </div>
  </div>
</footer>
