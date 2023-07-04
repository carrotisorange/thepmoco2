@include('includes.proprent-head')

                   

    <div class=" p-6  flex items-center justify-center">
    <div class="mt-10 mx-auto">

    <div>
    <!-- <h2 class="ml-4 font-semibold text-xl text-gray-600">Task Name</h2> -->

      <div class="bg-white  p-4 px-4 md:p-8 mb-6">
        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
          <div class="text-gray-600">
            <p class="font-medium text-lg">Upload a Listing</p>
            <p>Please fill out all the fields.</p>
          </div>

          <div class="lg:col-span-2">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
              <div class="md:col-span-3">
                  <label for="project_name">Name of Listing:</label> 
                  <input type="text" name="project_name" id="project_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
              </div>
             
              <div class="md:col-span-3">
                <!-- dropdown -->
                  <label for="date">Type</label>
                  <input type="text" name="date" id="date" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
              </div>

              <div class="md:col-span-3">
                <label for="scope_of_work">Location:</label>
                <input type="text" name="scope_of_work" id="scope_of_work" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
              </div>

              <div class="md:col-span-3">
                <label for="scope_of_work">Unit Price</label>
                <input type="text" name="scope_of_work" id="scope_of_work" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
              </div>

              <div class="md:col-span-6">
              <!-- calendar  -->
                  <label for="project_name">Listing Description</label> 
                  <input type="text" name="project_name" id="project_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
              </div>

              <div class="md:col-span-2">
              <!-- calendar  -->
                  <label for="project_name">Number of Rooms</label> 
                  <input type="text" name="project_name" id="project_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
              </div>
             
              <div class="md:col-span-2">
              <!-- calendar  -->
                  <label for="project_name">Number of Baths</label> 
                  <input type="text" name="project_name" id="project_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
              </div>
              <div class="md:col-span-2">
              <!-- calendar  -->
                  <label for="project_name">Maximum Number of Guests</label> 
                  <input type="text" name="project_name" id="project_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
              </div>
             
              
            </div>

            <div class="my-10 border border-t border-gray-200"></div>
            <!-- amenities -->
            <h1>Check Available Amenities:</h1>
            <div class="grid grid-cols-4">

         
                <div>
                  <div class="ml-3 my-5  p-1 w-20 inline-flex">
                   <input id="link-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                   <img width="26" class="" height="26" src="https://img.icons8.com/fluency-systems-regular/48/wi-fi-good.png" alt="wi-fi-good"/>
                   <label for="link-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Wifi</label>
                  </div>
                </div>

                <div>
                  <div class="ml-3 my-5  p-1 w-20 inline-flex">
                   <input id="link-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                   <img width="26" class="" height="26" src="https://img.icons8.com/fluency-systems-regular/48/wi-fi-good.png" alt="wi-fi-good"/>
                   <label for="link-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Wifi</label>
                  </div>
                </div>

                <div>
                  <div class="ml-3 my-5  p-1 w-20 inline-flex">
                   <input id="link-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                   <img width="26" class="" height="26" src="https://img.icons8.com/fluency-systems-regular/48/wi-fi-good.png" alt="wi-fi-good"/>
                   <label for="link-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Wifi</label>
                  </div>
                </div>

                <div>
                  <div class="ml-3 my-5  p-1 w-20 inline-flex">
                   <input id="link-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                   <img width="26" class="" height="26" src="https://img.icons8.com/fluency-systems-regular/48/wi-fi-good.png" alt="wi-fi-good"/>
                   <label for="link-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Wifi</label>
                  </div>
                </div>
                

            </div>

            <!-- upload pictures -->
            <div class="my-10 border border-t border-gray-200"></div>
            <h1 class="font-light text-base my-4">Upload Pictures</h1>
            <div id="images-container"></div>
              <div class="flex w-full">
                  <div id="multi-upload-button"
                      class="inline-flex items-center px-4 py-2 bg-gray-600 border border-gray-600 rounded-l font-semibold cursor-pointer text-sm text-white tracking-widest hover:bg-gray-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ">
                      Click to browse
                  </div>
                  <div class="w-4/12 lg:w-10/12 border border-gray-300 rounded-r-md flex items-center justify-between">
                      <span id="multi-upload-text" class="p-2"></span>
                      <button id="multi-upload-delete" class="hidden" onclick="removeMultiUpload()">
                          <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-red-700 w-3 h-3"
                              viewBox="0 0 320 512">
                              <path
                                      d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/>
                          </svg>
                      </button>
                  </div>
              </div>

    
        <input type="file" id="multi-upload-input" class="hidden" multiple/>
 

<script>
    //all ids and some classes are importent for this script

    multiUploadButton = document.getElementById("multi-upload-button");
    multiUploadInput = document.getElementById("multi-upload-input");
    imagesContainer = document.getElementById("images-container");
    multiUploadDisplayText = document.getElementById("multi-upload-text");
    multiUploadDeleteButton = document.getElementById("multi-upload-delete");

    multiUploadButton.onclick = function () {
        multiUploadInput.click(); // this will trigger the click event
    };

    multiUploadInput.addEventListener('change', function (event) {

        if (multiUploadInput.files) {
            let files = multiUploadInput.files;

            // show the text for the upload button text filed
            multiUploadDisplayText.innerHTML = files.length + ' files selected';

            // removes styles from the images wrapper container in case the user readd new images
            imagesContainer.innerHTML = '';
            imagesContainer.classList.remove("w-full", "grid", "grid-cols-1","sm:grid-cols-2","md:grid-cols-3","lg:grid-cols-4", "gap-4");

            // add styles to the images wrapper container
            imagesContainer.classList.add("w-full", "grid", "grid-cols-1","sm:grid-cols-2","md:grid-cols-3","lg:grid-cols-4", "gap-4");

            // the delete button to delete all files
            multiUploadDeleteButton.classList.add("z-100", "p-2", "my-auto");
            multiUploadDeleteButton.classList.remove("hidden");

            Object.keys(files).forEach(function (key) {

                let file = files[key];

                // the FileReader object is needed to display the image
                let reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function () {

                    // for each file we create a div to contain the image
                    let imageDiv = document.createElement('div');
                    imageDiv.classList.add("h-64", "mb-3", "w-full", "p-3", "rounded-lg", "bg-cover", "bg-center");
                    imageDiv.style.backgroundImage = 'url(' + reader.result + ')';
                    imagesContainer.appendChild(imageDiv);
                }
            })
        }
    })

    function removeMultiUpload() {
        imagesContainer.innerHTML = '';
        imagesContainer.classList.remove("w-full", "grid", "grid-cols-1","sm:grid-cols-2","md:grid-cols-3","lg:grid-cols-4", "gap-4");
        multiUploadInput.value = '';
        multiUploadDisplayText.innerHTML = '';
        multiUploadDeleteButton.classList.add("hidden");
        multiUploadDeleteButton.classList.remove("z-100", "p-2", "my-auto");
    }
</script>
                
              <div class="my-10 border border-t border-gray-200"></div>

              <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">

                <div class="text-gray-600">
                  <p class="font-medium text-sm">Security Deposit</p>
                </div>

                <div class="lg:col-span-2">
                  <div class="md:col-span-3">
                    <input type="text" name="project_name" id="project_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                  </div>
                </div>

                <div class="text-gray-600">
                  <p class="font-medium text-sm">Advanced Rent</p>
                </div>

                <div class="lg:col-span-2">
                  <div class="md:col-span-3">
                    <input type="text" name="project_name" id="project_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                  </div>
                </div>

                <div class="text-gray-600">
                  <p class="font-medium text-sm">Tax</p>
                </div>

                <div class="lg:col-span-2">
                  <div class="md:col-span-3">
                    <input type="text" name="project_name" id="project_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                  </div>
                </div>

                <div class="text-gray-600">
                  <p class="font-medium text-sm">Service Fee</p>
                </div>

                <div class="lg:col-span-2">
                  <div class="md:col-span-3">
                    <input type="text" name="project_name" id="project_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                  </div>
                </div>

                <div class="text-gray-600">
                  <p class="font-bold text-base">Total</p>
                </div>

                

                <div class="lg:col-span-2">
                  <div class="md:col-span-3">
                    <input type="text" name="project_name" id="project_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                  </div>
                </div>
                
              </div>

              <div class="md:col-span-6 text-right mt-4">
                <div class="inline-flex items-end">
                  <button class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">Publish</button>
                </div>
              </div>

            
          </div>
        </div>
      </div>
    </div>

                    </body>
                    </html>