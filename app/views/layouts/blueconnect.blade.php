<!DOCTYPE html>
<!--[if IE 9]>
<html class="lt-ie10" lang="en" >
   <![endif]-->
   <html class="no-js" lang="en" data-useragent="Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)">
      <head>
         <meta charset="utf-8"/>
         <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
         <title>blueConnect</title>
         <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    		 <?php if($route == '/'): ?>
             {{ HTML::style('resources/css_home/docs.css') }}
    		 <?php endif; ?>
         {{ HTML::style('resources/css_home/style.css') }}
         {{ HTML::style('resources/css_home/foundation-icons.css') }}
		 
		 {{ HTML::script('resources/js_home/jquery.js') }}
      </head>
      <body>
    	  <?php if($route == '/'): ?>
    		  <div id="fInquiry"><a href="{{ URL::to('registration') }}" class="btn btn-green">Course Registration</a></div>
    	  <?php endif; ?>   
         <header class="h-header -with-video">
            <div class="h-fvideo">
               <div class="h-fvideo__wrapper" style="opacity: 1;">
                  <video id="homepage-video" class="h-fvideo__video js-fvideo" loop="" muted="" preload="auto" style="" poster="data:image/gif,AAAA" autoplay="">
                     <source src="http://connect.bluemena.com/blueconnect.mp4" type="video/mp4">
                  </video>
               </div>
               <div class="h-fvideo__sm">
                  <div class="h-iloop js-iloop">
                     <ul class="h-iloop__list">
                        <li class="h-iloop__item">
                           <div style="background-image: url(../../tblsys/resources/img/slider1.JPG);">
                           </div>
                        </li>
                        <li class="h-iloop__item -anim-1 -fading-out">
                           <div style="background-image: url(../../tblsys/resources/img/slider2.JPG);">
                           </div>
                        </li>
                        <li class="h-iloop__item -anim-2 -fading-out">
                           <div style="background-image: url(../../tblsys/resources/img/slider3.JPG);">
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="h-header__inner row collapse">
               <div class="h-header__block columns -no-bg -lg">
                  <!--  removed width classes -->                  
                  <div class="h-header__meta -meta-home js-fvideo-fade-me" style="transform: translate3d(0px, 32px, 0px); opacity: 0.666667;">
                        <div class="h-header__meta-content">
                              <!--  -meta-simple class added -->
                              <div class="h-header__top">
                           <a class="h-header__logo-wrap" href="" title="blue mena group">                              
                           </a>                                                      
                        </div>    
                        <style>
                           .bluePage {
                               font-size: 3.1em!important;
                               color: #fff;
                               font-weight: 100;
                               font-family: Arial,sans-serif !important;
                               line-height: 1.1em;
                               margin-bottom: .5em;
                               text-shadow: 0 0 8px rgba(0,0,0,1);
                           }

                           .home-slide-content .home-button {
                               -webkit-box-shadow: none;
                               box-shadow: none;
                               padding: .775em .775em .775em 1em;
                               border: 3px solid #FFF;
                               background: 0 0;
                               -webkit-border-radius: 30px;
                               -moz-border-radius: 30px;
                               border-radius: 30px;
                           }

                           .home-button {                               
                                color: #fff !important;
                                text-transform: uppercase !important;
                                padding: .60em .60em .60em 1em !important;
                                text-decoration: none !important;
                                display: inline-block !important;
                                -webkit-border-radius: 18px !important;
                                -moz-border-radius: 18px !important;
                                border-radius: 18px !important;
                                border: solid 1px;
                                font-family: Arial,sans-serif !important;                                
                                width: 290px;
                                font-size: 21px;                               
                           }

                           .home-button .arrow {
                               background: url(resources/img/button-arrow.png) center right no-repeat;
                               background-size: 8px 14px;
                               display: block;
                               padding: .125em 1.875em 0 0;
                               min-height: 12px;
                               font-size: .9em;
                           }


                        .login-block {
                            width: 320px;
                            padding: 20px;
                            background: #fff;
                            border-radius: 5px;
                            border-top: 5px solid #008CBA;
                            margin: 0 auto;
                        }

                        .login-block h1 {
                            text-align: center;
                            color: #000;
                            font-size: 18px;
                            text-transform: uppercase;
                            margin-top: 0;
                            margin-bottom: 20px;
                        }

                        .login-block input {
                            width: 100%;
                            height: 42px;
                            box-sizing: border-box;
                            border-radius: 5px;
                            border: 1px solid #ccc;
                            margin-bottom: 20px;
                            font-size: 14px;    
                            padding: 0 20px 0 50px;
                            outline: none;
                        }

                        .login-block input#uname {
                            background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px top no-repeat;
                            background-size: 16px 80px;
                        }

                        .login-block input#username:focus {
                            background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px bottom no-repeat;
                            background-size: 16px 80px;
                        }

                        .login-block input#password {
                            background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px top no-repeat;
                            background-size: 16px 80px;
                        }

                        .login-block input#password:focus {
                            background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px bottom no-repeat;
                            background-size: 16px 80px;
                        }

                        .login-block input:active, .login-block input:focus {
                            border: 1px solid #008CBA;
                        }

                        .login-block #submitForm {
                            width: 100%;
                            height: 40px;
                            background: #008CBA;
                            box-sizing: border-box;
                            border-radius: 5px;
                            border: 1px solid #008CBA;
                            color: #fff;
                            font-weight: bold;
                            text-transform: uppercase;
                            font-size: 14px;
                            font-family: Montserrat;
                            outline: none;
                            cursor: pointer;
                        }

                        .login-block button:hover {
                            background: #ff7b81;
                        }
                        </style>                    
                        <h1 class="bluePage">                 
                           blueConnect
                        </h1>
                        <p class="h-header__snippet f-serif" style="font-family: Arial,sans-serif !important;">
                           Where the learning becomes fun, exciting and digitalized.
                        </p>
                        <p style="padding-top:0px;">
                           <a class="home-button" href="#login"><span class="arrow">SIGN IN</span></a>                           
                        </p>
                     </div>
                  </div>
               </div>               
            </div>
         </header>         
         <div class="h-content">
            {{ $content }}
         </div>       
         <footer class="h-footer">
            <div class="row">
               <div class="column medium-4">
                  <br>
                  <center>
                     <span class='st_facebook_large' displayText='Facebook'></span>
                     <span class='st_twitter_large' displayText='Tweet'></span>
                     <span class='st_googleplus_large' displayText='Google +'></span>
                  </center>
               </div>
               <div class="column medium-4">
                  <div class="h-footer__cr">
                     <h4 style="color: #828282;">ABOUT US</h4>
                     <p style="color: #828282;">
                        Blue Mena Group is one of the leading customer service in the MENA region for offering 
                        high level operational and business consultancy services. We are here to help you to 
                        achieve what is beyond the expectation of your business. We will be your true companion 
                        for your growth and success because that's our main objective.
                     </p>
                  </div>
               </div>
               <div class="column medium-4">
                  <div class="h-footer__cr">
                     <h4 style="color: #828282;">CONTACT US</h4>
                     <p style="color: #828282;">
                        Dubai Internet City<br>
                        Building 1 - Office 215<br>
                        Po Box 500071<br>
                        Dubai - UAE
                     </p>
                     <p style="color: #828282;">
                        Tel: +971 4 391 20 40<br>
                        Fax: +971 4 391 88 81<br>
                        Email: info@bluemena.com
                     </p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="column medium-7">
                  <div class="h-footer__cr" style="color: #828282;">
                     <p>&copy; Blue Mena Group 2015. All Rights Reserved.</p>
                  </div>
               </div>
            </div>
         </footer>
         
         {{ HTML::script('resources/js_home/foundation.js') }}	 
         {{ HTML::script('resources/js_home/modernizr.js') }}	 
         {{ HTML::script('resources/js_home/libs.min.js') }}
         {{ HTML::script('resources/js_home/main.min.js') }}      
         <script>
            $(document).foundation();
            
            var w = $( window ).width();
            
            if(w < 640) {
				$('#logo').attr('src', '<?php echo asset('resources/img/logo-thumb.png'); ?>');
				$('#right-side-bar').show();
            } else {
				$('#logo').attr('src', '<?php echo asset('resources/img/logo.png'); ?>');
				$('#right-side-bar').hide();
            }
            
            $(window).resize(function(){
				var w = $( window ).width();
				
				if(w < 640) {
					$('#logo').attr('src', '<?php echo asset('resources/img/logo-thumb.png'); ?>');
					$('#right-side-bar').show();
				} else {
					$('#logo').attr('src', '<?php echo asset('resources/img/logo.png'); ?>');
					$('#right-side-bar').hide();
				}
            });
         </script>
         <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
      </body>
   </html>