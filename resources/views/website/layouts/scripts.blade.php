 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <script src="{{ asset('website/assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('website/assets/vendors/bootstrap-select/bootstrap-select.min.js') }}"></script>
 <script src="{{ asset('website/assets/vendors/jarallax/jarallax.min.js') }}"></script>
 <script src="{{ asset('website/assets/vendors/jquery-ui/jquery-ui.js') }}"></script>
 <script src="{{ asset('website/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
 <script src="{{ asset('website/assets/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
 <script src="{{ asset('website/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}"></script>
 <script src="{{ asset('website/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}"></script>
 <script src="{{ asset('website/assets/vendors/jquery-validate/jquery.validate.min.js') }}"></script>
 <script src="{{ asset('website/assets/vendors/nouislider/nouislider.min.js') }}"></script>
 <script src="{{ asset('website/assets/vendors/tiny-slider/tiny-slider.js') }}"></script>
 <script src="{{ asset('website/assets/vendors/wnumb/wNumb.min.js') }}"></script>
 <script src="{{ asset('website/assets/vendors/owl-carousel/js/owl.carousel.min.js') }}"></script>
 <script src="{{ asset('website/assets/vendors/wow/wow.js') }}"></script>
 <script src="{{ asset('website/assets/vendors/imagesloaded/imagesloaded.min.js') }}"></script>
 <script src="{{ asset('website/assets/vendors/isotope/isotope.js') }}"></script>
 <script src="{{ asset('website/assets/vendors/slick/slick.min.js') }}"></script>
 <script src="{{ asset('website/assets/vendors/countdown/countdown.min.js') }}"></script>
 <script src="{{ asset('website/assets/vendors/jquery-circleType/jquery.circleType.js') }}"></script>
 <script src="{{ asset('website/assets/vendors/jquery-lettering/jquery.lettering.min.js') }}"></script>
 <!-- gsap js -->
 <script src="{{ asset('website/assets/vendors/gsap/gsap.js') }}"></script>
 <script src="{{ asset('website/assets/vendors/gsap/scrolltrigger.min.js') }}"></script>
 <script src="{{ asset('website/assets/vendors/gsap/splittext.min.js') }}"></script>
 <script src="{{ asset('website/assets/vendors/gsap/careox-split.js') }}"></script>
 <!-- template js -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
 <script src="{{ asset('website/assets/js/careox.js') }}"></script>
 @yield('js')
 <script>
     $(document).ready(function() {
         $('#contactform').on('submit', function(e) {
             e.preventDefault();

             // Clear previous errors
             $('.error-label').text('').css('color', '');

             let formData = new FormData(this);

             $.ajax({
                 url: "{{ route('front.contactus.store') }}",
                 method: 'POST',
                 data: formData,
                 processData: false,
                 contentType: false,
                 headers: {
                     'X-CSRF-TOKEN': '{{ csrf_token() }}'
                 },
                 success: function(response) {
                     if (response.status === 'success') {
                         $('#contactform')[0].reset();
                         alert('Your enquiry has been submitted successfully!');
                     }
                 },
                 error: function(xhr) {
                     if (xhr.status === 422) {
                         let errors = xhr.responseJSON.errors;
                         for (let field in errors) {
                             $(`[name="${field}"]`).closest('.form-group').find(
                                     '.error-label')
                                 .text(errors[field][0])
                                 .css('color', 'red');
                         }
                     } else {
                         alert('Something went wrong. Please try again.');
                     }
                 }
             });
         });
         toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "timeOut": "5000",
            };
     });
 </script>

 {{-- <script>
     $(document).ready(function() {
         $('#eventForm').on('submit', function(e) {
             e.preventDefault();

             $('.error-label').text('').css('color', '');

             let formData = new FormData(this);

             $.ajax({
                 url: "{{ route('front.event.book') }}",
                 method: 'POST',
                 data: formData,
                 processData: false,
                 contentType: false,
                 headers: {
                     'X-CSRF-TOKEN': '{{ csrf_token() }}'
                 },
                 success: function(response) {
                     if (response.status === 'success') {
                         $('#eventForm')[0].reset();
                         alert(response.message);
                     }
                 },
                 error: function(xhr) {
                     if (xhr.status === 422) {
                         let errors = xhr.responseJSON.errors;
                         for (let field in errors) {
                             $(`[name="${field}"]`).closest('.form-group').find(
                                     '.error-label')
                                 .text(errors[field][0])
                                 .css('color', 'red');
                         }
                     } else {
                         alert('Something went wrong. Please try again.');
                     }
                 }
             });
         });
     });
 </script> --}}









 
 <script>
     $(document).ready(function() {
         $('#volunteerForm').on('submit', function(e) {
             e.preventDefault();

             let formData = new FormData(this);

             $.ajax({
                 url: "{{ route('front.store.volunteer') }}",
                 method: 'POST',
                 data: formData,
                 processData: false,
                 contentType: false,
                 headers: {
                     'X-CSRF-TOKEN': '{{ csrf_token() }}'
                 },
                 success: function(response) {
                     if (response.status === 'success') {
                         $('#volunteerForm')[0].reset();
                         alert(response.message);
                     }
                 },
                 error: function(xhr) {
                     if (xhr.status === 422) {
                         let errors = xhr.responseJSON.errors;
                         for (const field in errors) {
                             $(`[name="${field}"]`).next('.error-label').text(errors[field][
                                 0]);
                         }
                     } else {
                         alert('Something went wrong. Please try again.');
                     }
                 }
             });
         });
     });
 </script>
