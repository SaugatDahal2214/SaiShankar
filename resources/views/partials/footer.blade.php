<footer id="footer" class="glass-navbar py-16">
    <div class="container px-4">
      <div class="flex flex-wrap">
        <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4">
          <div class="mx-3 mb-8">
            <div class="footer-logo mb-3">
              <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
              <img src="{{ asset($settings->logo) }}" alt="" />
              </a>
            </div>
            <p class="text-gray-800">
                {{$settings->footer}}
            </p>
          </div>
        </div>
        <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4">
          <div class="mx-3 mb-8">
            <h3 class="font-bold text-xl text-red-700 mb-5">Services</h3>
            <ul>
              <li>
                <a
                  href="javascript:void(0)"
                  class="
                    leading-9
                    text-blue-700
                    duration-300
                    hover:text-blue-500
                  "
                >
                  Medical  Store
                </a>
              </li>
              <li>
                <a
                  href="javascript:void(0)"
                  class="
                    leading-9
                    text-blue-700
                    duration-300
                    hover:text-blue-800
                  "
                  >Dental Clinic</a
                >
              </li>
              <li>
                <a
                  href="javascript:void(0)"
                  class="
                    leading-9
                    text-blue-700
                    duration-300
                    hover:text-blue-800
                  "
                  >Medical Oxygen</a
                >
              </li>
            </ul>
          </div>
        </div>
        <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4">
          <div class="mx-3 mb-8">
            <h3 class="font-bold text-xl text-red-700 mb-5">Qucik Link</h3>
            <ul>
              <li>
                <a
                  href="javascript:void(0)"
                  class="
                    leading-9
                    text-blue-700
                    duration-300
                    hover:text-blue-800
                  "
                >
                  Home
                </a>
              </li>
              <li>
                <a
                  href="javascript:void(0)"
                  class="
                    leading-9
                    text-blue-700
                    duration-300
                    hover:text-blue-800
                  "
                  >About</a
                >
              </li>
              <li>
                <a
                  href="javascript:void(0)"
                  class="
                    leading-9
                    text-blue-700
                    duration-300
                    hover:text-blue-800
                  "
                  >Contact</a
                >
              </li>
            </ul>
          </div>
        </div>
        <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4">
          <div class="mx-3 mb-8">
            <h3 class="font-bold text-xl text-gray-800 mb-5">Find us on</h3>

            <ul class="social-icons flex justify-start">
              <li class="mr-4">
                <a
                  href={{ $settings->Social_link_one }}
                  class="
                    flex
                    justify-center
                    items-center
                    w-8
                    h-8
                    bg-white
                    rounded-full
                    text-sm text-gray-700
                    duration-300
                    hover:text-white hover:bg-indigo-500
                  "
                >
                <img src="{{asset($settings->Social_icon_one)}}" alt="">
                </a>
              </li>
              <li class="mr-4">
                <a
                  href={{ $settings->Social_link_two }}
                  class="
                    flex
                    justify-center
                    items-center
                    w-8
                    h-8
                    bg-white
                    rounded-full
                    text-sm text-gray-700
                    duration-300
                    hover:text-white hover:bg-blue-400
                  "
                >
                <img src="{{asset($settings->Social_icon_two)}}" alt="">
                </a>
              </li>
         
              <li class="mr-4">
                <a
                  href={{ $settings->Social_link_three }}
                  class="
                    flex
                    justify-center
                    items-center
                    w-8
                    h-8
                    bg-white
                    rounded-full
                    text-sm text-gray-700
                    duration-300
                    hover:text-white hover:bg-indigo-600
                  "
                >
                <img src="{{asset($settings->Social_icon_three)}}" alt="">
                  </i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <section class="glass-navbar py-6 border-t-2 border-gray-900 border-dotted">
    <div class="container px-4">
      <div class="flex flex-wrap">
        <div class="w-full text-center">
          <span class="text-gray-800 text-center">
            Designed and Developed by Code Craft Web Solution
          </span>
        </div>
      </div>
    </div>
  </section>
