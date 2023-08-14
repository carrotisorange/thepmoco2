<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content= "width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="canonical" href="https://thepropertymanager.online"/>
    <title>@yield('title')</title>

    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="Property,
    Property Management,
    Property manager,
    Property management system,
    Leasing,
    Leasing management,
    Leasing manager,
    Leasing management system,
    Real estate management,
    Real estate manager,
    Real estate management system,
    Long-term lease,
    Long-term Rental property,
    Rental Property,
    Rental property management system,
    Real Property Technology,
    Rental Property Technology,
    Rental Property Business,
    System as a service,
    Condominium management system,
    Association Management System,
    Rental billing system,
    property management system for hotels,
    property management system in hotel,
    leasing management software,
    property leasing management,
    property management software,
    property management software systems,
    property management companies,
    Real Estate Technology,
    online condominium management system,
    association management system software"> 

         <!-- facebook -->
    <meta property="og:url"                content="https://thepropertymanager.online">
    <meta property="og:type"               content="website">
    <meta property="og:title"              content="Increase transparency, and efficiency in rental property operations with a simple and easy to use system for leasing and property management.">
    <meta property="og:description"        content="Visit us now: thepropertymanager.online">
    <meta property="og:image"              content="https://thepropertymanager.online/brands/propsuite/propsuite.png">

    <script type="application/ld+json">
  {
  "@context": "https://schema.org", 
  "@type": "Saas Business",             
  "name": "The PMO Co",            
  "image": "https://thepropertymanager.online/brands/propsuite/propsuite.png",          
  "@id": "https://thepropertymanager.online/", 
  "url": "https://thepropertymanager.online/",
  "telephone": "(+63) 916 779 9750",                
   "email": "sales@thepmo.co",	
  "address": {
    "@type": "PostalAddress",          
    "streetAddress": "39 Engineers Hill", 
    "addressLocality": "Baguio City",
    "postalCode": "2600",
    "addressCountry": "Philippines"
  }
  "sameAs" : [
    "https://www.linkedin.com/company/the-pmo-co/",
  ]
  

</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-P3GZPSF');</script>
<!-- End Google Tag Manager -->

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-XFVDKSHJQL"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-XFVDKSHJQL');
</script>

<script type="text/javascript">
    (function() {
        window.sib = {
            equeue: [],
            client_key: "zog8pyjpmglpbw3pgnvz7kyg"
        };
        /* OPTIONAL: email for identify request*/
        // window.sib.email_id = 'example@domain.com';
        window.sendinblue = {};
        for (var j = ['track', 'identify', 'trackLink', 'page'], i = 0; i < j.length; i++) {
        (function(k) {
            window.sendinblue[k] = function() {
                var arg = Array.prototype.slice.call(arguments);
                (window.sib[k] || function() {
                        var t = {};
                        t[k] = arg;
                        window.sib.equeue.push(t);
                    })(arg[0], arg[1], arg[2]);
                };
            })(j[i]);
        }
        var n = document.createElement("script"),
            i = document.getElementsByTagName("script")[0];
            n.type = "text/javascript", n.id = "sendinblue-js",
            n.async = !0, n.src = "https://sibautomation.com/sa.js?key="+ window.sib.client_key,
            i.parentNode.insertBefore(n, i), window.sendinblue.page();
    })();
    </script>

</head>

<style>
  body{
    font-family: Poppins;
  }
</style>


        
  <main class="bg-purple-100 min-h-screen">
  <div class="pt-10 flex justify-center items-center">
    <img class="w-32" src="{{ asset('/brands/propsuite/propsuite.png') }}">
  </div>
  <div class="pt-16 flex justify-center items-center h-full">
      <p class="block text-2xl font-semibold text-gray-700">Hi there, we are moving out!</p>
  </div>
      <div class="pt-10 flex justify-center items-center h-full">
      <p class="block text-base">Check out our new website at:</p>
  </div>

  <div class=" flex justify-center items-center h-full">
      <a href="http://propsuite.net/" class="block font-bold text-xl text-purple-800 hover:text-gray-500">propsuite.net</p>
  </div>

  <div class="-mt-32 flex justify-center items-center h-full">
    <img src="{{ asset('/brands/propsuite/moving.png') }}">
  </div>
      
      
  </main>
    



</body>



</html>