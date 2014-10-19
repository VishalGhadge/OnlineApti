

jQuery(window).load(function() {

    var error_msg_box = null;

    jQuery('.admin_registration form').keypress(function(e) {

        if (e.keyCode === 13) {
            jQuery('.admin_registration #enter').trigger('click');
            e.preventDefault();
            return false;
        }
    });
    jQuery('.admin_registration #enter').click(function(e) {

        AdminRegistration();
        e.preventDefault();
        return false;
    });


    // Check for validity Register Form
    function AdminRegistration() {
        console.log('click');
        var error = formValidate(jQuery(".admin_registration form"), {
            error_message_show: true,
            error_message_time: 3000,
            error_message_class: "sc_infobox sc_infobox_style_error",
            error_fields_class: "error_fields_class",
            exit_after_first_error: true,
            rules: [
                {
                    field: "Name",
                    min_length: {value: 1, message: "The Name field can\'t be empty"},
                    max_length: {value: 60, message: "Too long Name field"}
                }, {
                    field: "Username",
                    min_length: {value: 5, message: "The Username field can\'t be empty"},
                    max_length: {value: 20, message: "Too long Username field"}
                },
                {
                    field: "Password",
                    min_length: {value: 5, message: "The password can\'t be empty and shorter then 5 characters"},
                    max_length: {value: 20, message: "Too long password"}
                },
                {
                    field: "C_Password",
                    equal_to: {value: 'Password', message: "The passwords in both fields are not equal"}
                },
                {
                    field: "Email",
                    min_length: {value: 7, message: "Too short (or empty) email address"},
                    max_length: {value: 60, message: "Too long email address"},
                    mask: {value: "^([a-z0-9_\\-]+\\.)*[a-z0-9_\\-]+@[a-z0-9_\\-]+(\\.[a-z0-9_\\-]+)*\\.[a-z]{2,6}$", message: "Not valid email address"}
                }, {
                    field: "Contact_No",
                    min_length: {value: 10, message: "The Contact_No field must be exact 10 Digit"},
                    max_length: {value: 10, message: "The Contact_No field must be exact 10 Digit"}
                }, {
                    field: "State",
                    min_length: {value: 1, message: "The State field can\'t be empty"},
                    max_length: {value: 20, message: "Too long State field"}
                }, {
                    field: "District",
                    min_length: {value: 1, message: "The District field can\'t be empty"},
                    max_length: {value: 20, message: "Too long District field"}
                }, {
                    field: "City",
                    min_length: {value: 1, message: "The City field can\'t be empty"},
                    max_length: {value: 20, message: "Too long City field"}
                }
            ]
        });

        if (!error) {
            var Contact_number = jQuery(".admin_registration #Contact_No").val();
            var error_At_Contact = 0;
            var error_At_Pincode = 0;
            if (/^[0-9]{1,10}$/.test(+Contact_number) && Contact_number.length <= 10)
            {

                error_At_Contact = 0;


            } else {

                error_At_Contact = 1;


            }


            if (error_At_Contact == 1)
            {
                error_msg_box = jQuery(".admin_registration form").find(".result");
                if (error_msg_box.length === 0) {
                    jQuery(".admin_registration form").append('<div class="result"></div>');
                    error_msg_box = jQuery(".admin_registration form").find(".result");
                }
                if ("sc_infobox sc_infobox_style_error") {
                    error_msg_box.toggleClass("sc_infobox sc_infobox_style_error", true);
                }
                var error_msg = '<p class="error_item"> Please Enter Correect Contact Number</p>';
                error_msg_box.html(error_msg).fadeIn();
                setTimeout(function() {
                    error_msg_box.fadeOut();
                }, 5000);
                jQuery("#Contact_No").toggleClass("error_fields_class", true);

            }


        }
        if (!error) {
//            document.forms['registration_form'].submit();

            performAdminRegistration();
        }
    }


    /**
     * This method is used for Admin registration
     * @returns {undefined}
     */
    function  performAdminRegistration() {

        jQuery(".loader img").fadeIn(100);
        jQuery('.admin_registration .result').removeAttr('style');
        jQuery.post('webservice/register.php',
                {
                    Name: jQuery('#Name').val(),
                    Username: jQuery('#Username').val(),
                    Password: jQuery('#Password').val(),
                    Email: jQuery('#Email').val(),
                    Contact_No: jQuery('#Contact_No').val(),
                    State: jQuery('#State').val(),
                    District: jQuery('#District').val(),
                    City: jQuery('#City').val()
                },
        function(rez) {


//            var rez = JSON.parse(response);
            jQuery('.admin_registration .result')
                    .toggleClass('sc_infobox_style_error', false)
                    .toggleClass('sc_infobox_style_success', false);
            if (rez.success == 1) {
                jQuery('.admin_registration .result').addClass('sc_infobox_style_success').html('Registration success! Please log in!');
                setTimeout("jQuery('.admin_registration .close').trigger('click'); jQuery('.login-popup-link').trigger('click');", 2000);

                jQuery('#Name').val('');
                jQuery('#Username').val('');
                jQuery('#Password').val('');
                jQuery('#C_Password').val('');
                jQuery('#Contact_No').val('');
                jQuery('#Email').val('');
                jQuery('#District').val('');
                jQuery('#State').val('');
                jQuery('#City').val('');

                setTimeout('window.location.href = "http://adminpea.openinfotech.org/sign-in.php";', 1000);
            } else if (rez.success == -1) {
                jQuery('.admin_registration .result').addClass('sc_infobox_style_error').html('Registration failed! ' + rez.message);


                jQuery("#Username").toggleClass("error_fields_class", true);



            } else {
                jQuery('.admin_registration .result').addClass('sc_infobox_style_error').html('Registration failed! ' + rez.message);
            }
            jQuery('.admin_registration .result').fadeIn();
            setTimeout("jQuery('.admin_registration .result').fadeOut()", 5000);

//            console.log("session destroys");
//            location.reload();
//            
//            
            jQuery(".loader img").fadeOut(200);
        }, 'json');



    }

    // Admin Login ...!!
    jQuery('.admin_login form').keypress(function(e) {

        if (e.keyCode === 13) {
            jQuery('.admin_login #enter').trigger('click');
            e.preventDefault();
            return false;
        }
    });
    
    jQuery('.admin_login #enter').click(function(e) {

        AdminLogin();
        e.preventDefault();
        return false;
    });
    // Check for validity Register Form
    function AdminLogin() {
        var error = formValidate(jQuery(".admin_login form"), {
            error_message_show: true,
            error_message_time: 6000,
            error_message_class: "sc_infobox sc_infobox_style_error",
            error_fields_class: "error_fields_class",
            exit_after_first_error: true,
            rules: [{
                    field: "Username",
                    min_length: {value: 5, message: "The Username field can\'t be empty"},
                    max_length: {value: 20, message: "Too long Username field"}
                },
                {
                    field: "Password",
                    min_length: {value: 5, message: "The password can\'t be empty and shorter then 5 characters"},
                    max_length: {value: 20, message: "Too long password"}
                }]});

        if (!error) {
//            document.forms['registration_form'].submit();

            performAdminLogin();
        }
    }


    /**
     * This method is used for Admin registration
     * @returns {undefined}
     */
    function  performAdminLogin() {

        jQuery(".loader img").fadeIn(100);
        jQuery('.admin_login .result').removeAttr('style');
        jQuery.post('WebServices/login.php',
                {
                    Username: jQuery('#Username').val(),
                    Password: jQuery('#Password').val()
                },
        function(rez) {


            //            var rez = JSON.parse(response);             
            jQuery('.admin_login .result')
                    .toggleClass('sc_infobox_style_error', false)
                    .toggleClass('sc_infobox_style_success', false);
            if (rez.success == 1) {

                jQuery('.admin_login .result').addClass('sc_infobox_style_success').html('Login successful!');

                setTimeout("jQuery('.admin_login .close').trigger('click'); jQuery('.login-popup-link').trigger('click');", 2000);

                setTimeout('window.location.href = "http://localhost:81/OnlineApti/index.php";', 1000);
            } else if (rez.success == -1) {
                jQuery('.admin_login .result').addClass('sc_infobox_style_error').html(rez.message);


                jQuery("#Username").toggleClass("error_fields_class", true);



            } else if (rez.success == -2) {
                jQuery('.admin_login .result').addClass('sc_infobox_style_error').html(rez.message);


                jQuery("#Password").toggleClass("error_fields_class", true);



            } else {
                jQuery('.admin_login .result').addClass('sc_infobox_style_error').html('Registration failed! ' + rez.message);
            }
            jQuery('.admin_login .result').fadeIn();
            setTimeout("jQuery('.admin_login .result').fadeOut()", 5000);

            //            console.log("session destroys");
//            location.reload();
            //            
            //            
            jQuery(".loader img").fadeOut(200);
        }, 'json');



    }


    // adding device ..!!
    jQuery('.add_devices form').keypress(function(e) {

        if (e.keyCode === 13) {
            jQuery('.add_devices #enter').trigger('click');
            e.preventDefault();
            return false;
        }
    });
    jQuery('.add_devices #enter').click(function(e) {

        console.log('click');
        AddDevice();
        e.preventDefault();
        return false;
    });
    // Check for validity Register Form
    function AddDevice() {
        var error = formValidate(jQuery(".add_devices form"), {
            error_message_show: true,
            error_message_time: 5000,
            error_message_class: "sc_infobox sc_infobox_style_error",
            error_fields_class: "error_fields_class",
            exit_after_first_error: true,
            rules: [
                {
                    field: "Device_Name",
                    min_length: {value: 1, message: "The Device Name field can\'t be empty"},
                    max_length: {value: 60, message: "Too long Device Name field"}
                }, {
                    field: "Username",
                    min_length: {value: 5, message: "The Username field can\'t be empty"},
                    max_length: {value: 20, message: "Too long Username field"}
                },
                {
                    field: "Password",
                    min_length: {value: 5, message: "The password can\'t be empty and shorter then 5 characters"},
                    max_length: {value: 20, message: "Too long password"}
                },
                {
                    field: "C_Password",
                    equal_to: {value: 'Password', message: "The passwords in both fields are not equal"}
                }, {
                    field: "Device_Version",
                    min_length: {value: 1, message: "The Device Version field can\'t be empty"},
                    max_length: {value: 20, message: "Too long Device Version field"}
                }, {
                    field: "Device_Owner",
                    min_length: {value: 1, message: "The Device Owner field can\'t be empty"},
                    max_length: {value: 20, message: "Too long Device Owner field"}
                }
            ]
        });

        if (!error) {
//            document.forms['registration_form'].submit();

            performAddDevice();
        }
    }


    /**
     * This method is used for Admin registration
     * @returns {undefined}
     */
    function  performAddDevice() {

        jQuery(".loader img").fadeIn(100);
        jQuery('.add_devices .result').removeAttr('style');
        jQuery.post('webservice/add-device.php',
                {
                    Admin_Id: jQuery('#Admin_Id').val(),
                    Device_Name: jQuery('#Device_Name').val(),
                    Username: jQuery('#Username').val(),
                    Password: jQuery('#Password').val(),
                    Device_Version: jQuery('#Device_Version').val(),
                    Device_Owner: jQuery('#Device_Owner').val(),
                },
                function(rez) {


//            var rez = JSON.parse(response);
                    jQuery('.add_devices .result')
                            .toggleClass('sc_infobox_style_error', false)
                            .toggleClass('sc_infobox_style_success', false);
                    if (rez.success == 1) {
                        jQuery('.add_devices .result').addClass('sc_infobox_style_success').html('Device Added Successfully !');
                        setTimeout("jQuery('.add_devices .close').trigger('click'); jQuery('.login-popup-link').trigger('click');", 2000);

                        jQuery('#Device_Name').val('');
                        jQuery('#Username').val('');
                        jQuery('#Password').val('');
                        jQuery('#C_Password').val('');
                        jQuery('#Device_Version').val('');
                        jQuery('#Device_Owner').val('');

//                        setTimeout('window.location.href = "http://adminpea.openinfotech.org/sign-in.php";', 1000);
                    } else if (rez.success == -1) {
                        jQuery('.add_devices .result').addClass('sc_infobox_style_error').html('Registration failed! ' + rez.message);


                        jQuery("#Username").toggleClass("error_fields_class", true);



                    } else {
                        jQuery('.add_devices .result').addClass('sc_infobox_style_error').html('Registration failed! ' + rez.message);
                    }
                    jQuery('.add_devices .result').fadeIn(500);
                    setTimeout("jQuery('.add_devices .result').fadeOut()", 6000);

//            console.log("session destroys");
//            location.reload();
//            
//            
                    jQuery(".loader img").fadeOut(200);
                }, 'json');



    }


//    jQuery('.add_problem_form').keypress(function(e) {
//
//        if (e.keyCode === 13) {
//            jQuery('.add_problem_form #enter').trigger('click');
//            e.preventDefault();
//            return false;
//        }
//    });
    jQuery('.add_problem_form #enter').click(function(e) {

        console.log('click');
        AddProblem();
        e.preventDefault();
        return false;
    });
    // Check for validity Register Form
    function AddProblem() {
        var error = formValidate(jQuery(".add_problem_form"), {
            error_message_show: true,
            error_message_time: 5000,
            error_message_class: "sc_infobox sc_infobox_style_error",
            error_fields_class: "error_fields_class",
            exit_after_first_error: true,
            rules: [
                {
                    field: "Problem_Title",
                    min_length: {value: 1, message: "The Problem Title field can\'t be empty"},
                    max_length: {value: 60, message: "Too long Problem Title field"}
                }, {
                    field: "Problem_Description",
                    min_length: {value: 5, message: "The Problem Description field can\'t be empty"},
                    max_length: {value: 1000, message: "Too long Problem Description field"}
                }
            ]
        });

        if (!error) {
//            document.forms['registration_form'].submit();

            performAddProblem();
        }
    }


    /**
     * This method is used for Admin registration
     * @returns {undefined}
     */
    function  performAddProblem() {

        jQuery(".loader img").fadeIn(100);
        jQuery('.add_problem_form .result').removeAttr('style');
        jQuery.post('webservice/add-problem.php',
                {
                    Problem_Title: jQuery('#Problem_Title').val(),
                    Problem_Text: jQuery('#Problem_Text').val(),
                    Campaign_Id: jQuery('#Campaign_Id').val(),
                },
                function(rez) {


//            var rez = JSON.parse(response);
                    jQuery('.add_problem_form .result')
                            .toggleClass('sc_infobox_style_error', false)
                            .toggleClass('sc_infobox_style_success', false);
                    if (rez.success == 1) {
                        jQuery('.add_problem_form .result').addClass('sc_infobox_style_success').html('Problem Added Successfully !');
                        setTimeout("jQuery('.add_problem_form .close').trigger('click'); jQuery('.login-popup-link').trigger('click');", 2000);

                        jQuery('#Problem_Title').val('');
                        jQuery('#Problem_Text').val('');


                        setTimeout('window.location.reload();', 500);
                    } else if (rez.success == -1) {
                        jQuery('.add_problem_form .result').addClass('sc_infobox_style_error').html('Registration failed! ' + rez.message);


                        jQuery("#Username").toggleClass("error_fields_class", true);



                    } else {
                        jQuery('.add_problem_form .result').addClass('sc_infobox_style_error').html('Registration failed! ' + rez.message);
                    }
                    jQuery('.add_problem_form .result').fadeIn(500);
                    setTimeout("jQuery('.add_problem_form .result').fadeOut()", 6000);

//            console.log("session destroys");
//            location.reload();
//            
//            
                    jQuery(".loader img").fadeOut(200);
                }, 'json');



    }

    jQuery('.edit_problem1 #enter').click(function(e) {

        console.log('click');
//        fProblem();
        e.preventDefault();
        return false;
    });
    // Check for validity Register Form
    function EditProblem() {
        var error = formValidate(jQuery(".edit_problem"), {
            error_message_show: true,
            error_message_time: 5000,
            error_message_class: "sc_infobox sc_infobox_style_error",
            error_fields_class: "error_fields_class",
            exit_after_first_error: true,
            rules: [
                {
                    field: "Problem_Title",
                    min_length: {value: 1, message: "The Problem Title field can\'t be empty"},
                    max_length: {value: 60, message: "Too long Problem Title field"}
                }, {
                    field: "Problem_Description",
                    min_length: {value: 5, message: "The Problem Description field can\'t be empty"},
                    max_length: {value: 200, message: "Too long Problem Description field"}
                }
            ]
        });

        if (!error) {
//            document.forms['registration_form'].submit();

            performEditProblem();
        }
    }


    /**
     * This method is used for Admin registration
     * @returns {undefined}
     */
    function  performEditProblem() {

        jQuery(".loader img").fadeIn(100);
        jQuery('.edit_problem .result').removeAttr('style');
        jQuery.post('webservice/edit-campaign-problem.php',
                {
                    Problem_Title: jQuery('#Problem_Title').val(),
                    Problem_Text: jQuery('#Problem_Text').val(),
                    Problem_Id: jQuery('#Problem_Id').val()
                },
        function(rez) {


//            var rez = JSON.parse(response);
            jQuery('.edit_problem .result')
                    .toggleClass('sc_infobox_style_error', false)
                    .toggleClass('sc_infobox_style_success', false);
            if (rez.success == 1) {
                jQuery('.edit_problem .result').addClass('sc_infobox_style_success').html('Problem Added Successfully !');
                setTimeout("jQuery('.edit_problem .close').trigger('click'); jQuery('.login-popup-link').trigger('click');", 2000);

                jQuery('#Problem_Title').val('');
                jQuery('#Problem_Text').val('');


                setTimeout('window.location.reload();', 500);
            } else {
                jQuery('.edit_problem .result').addClass('sc_infobox_style_error').html('Registration failed! ' + rez.message);
            }
            jQuery('.edit_problem .result').fadeIn(500);
            setTimeout("jQuery('.edit_problem .result').fadeOut()", 6000);

//            console.log("session destroys");
//            location.reload();
//            
//            
            jQuery(".loader img").fadeOut(200);
        }, 'json');



    }


    // Update User Personal Info ..
    jQuery('.Updt_Info #enter').click(function(e) {

        console.log('click');
        Check_Info();
        //e.preventDefault();
        return false;
    });
    // Check Info to Update ..
    function Check_Info() {
        var error = formValidate(jQuery(".Updt_Info"), {
            error_message_show: true,
            error_message_time: 5000,
            error_message_class: "sc_infobox sc_infobox_style_error",
            error_fields_class: "error_fields_class",
            exit_after_first_error: true,
            rules: [
                {
                    field: "Name",
                    min_length: {value: 1, message: "The Name can't be empty"},
                    max_length: {value: 60, message: "Plz Enter short name.."}
                }, {
                    field: "Contact",
                    min_length: {value: 1, message: "The Contact field cant be empty"},
                    max_length: {value: 10, message: "You have Entered more than 10 number's"}
                }
                , {
                    field: "State",
                    min_length: {value: 1, message: "The State field cant be empty"},
                    max_length: {value: 30, message: "State field is too long"}
                }
                , {
                    field: "District",
                    min_length: {value: 1, message: "The District field cant be empty"},
                    max_length: {value: 30, message: "District field is too long"}
                }
                , {
                    field: "City",
                    min_length: {value: 1, message: "The City field cant be empty"},
                    max_length: {value: 30, message: "City field is too long"}
                }
                , {
                    field: "Education",
                    min_length: {value: 1, message: "The Education field cant be empty"},
                    //max_length: {value: 80, message: "Education field is too long"}
                }
                , {
                    field: "DOB",
                    min_length: {value: 1, message: "Plz choose a Date of Birth"},
                    max_length: {value: 10, message: "choose proper date"}
                }
                , {
                    field: "Password",
                    min_length: {value: 1, message: "The Password field cant be empty"},
                    //max_length: {value: 10, message: "choose proper date"}
                }
            ]
        });

        if (!error) {
//            document.forms['registration_form'].submit();

            Update_Info();
        }
    }
    function  Update_Info() {

        jQuery(".Updt_Info .loader img").fadeIn(100);
        jQuery('.Updt_Info .result').removeAttr('style');
        jQuery.post('http://adminpea.openinfotech.org/webservice/Updt_personal_Info.php',
                {
                    Name: jQuery('#Name').val(),
                    Contact: jQuery('#Contact').val(),
                    State: jQuery('#State').val(),
                    District: jQuery('#District').val(),
                    City: jQuery('#City').val(),
                    Education: jQuery('#Education').val(),
                    DOB: jQuery('#DOB').val(),
                    Password: jQuery('#Password').val()
                },
        function(rez) {


//            var rez = JSON.parse(response);
            jQuery('.Updt_Info .result')
                    .toggleClass('sc_infobox_style_error', false)
                    .toggleClass('sc_infobox_style_success', false);
            if (rez.success == 1) {
                jQuery('.Updt_Info .result').addClass('sc_infobox_style_success').html('Profile Updated Successfully!');
//                setTimeout("jQuery('Updt_Info').trigger('click'); jQuery('.Updt_Info').trigger('click');", 2000);

                // jQuery('#Problem_Title').val('');
                //jQuery('#Problem_Text').val('');


                setTimeout('window.location.reload();', 500);
            } else {
                jQuery('.Updt_Info .result').addClass('sc_infobox_style_error').html('Invalied Password !');
            }

//            console.log("session destroys");
//            location.reload();
//            
//            
            jQuery(".Updt_Info .loader img").fadeOut(200);
        }, 'json');



    }
    
    // Update Account Info
    
    jQuery('.Updt_Acc #hit').click(function(e) {

        console.log('click');
        Check_Acc();
        //e.preventDefault();
        return false;
    });
    // Check Info to Update ..
    function Check_Acc() {
        var error = formValidate(jQuery(".Updt_Acc"), {
            error_message_show: true,
            error_message_time: 5000,
            error_message_class: "sc_infobox sc_infobox_style_error",
            error_fields_class: "error_fields_class",
            exit_after_first_error: true,
            rules: [
                {
                    field: "Usr_NM",
                    min_length: {value: 1, message: "The User Name can't be empty"},
                    max_length: {value: 60, message: "Plz Enter short User Name.."}
                }, 
                {
                    field: "Password",
                    min_length: {value: 1, message: "The Password field cant be empty"},
                    //max_length: {value: 10, message: "choose proper date"}
                }
            ]
        });

        if (!error) {
//            document.forms['registration_form'].submit();

            Update_Acc();
        }
    }
    function  Update_Acc() {

        jQuery(".Updt_Acc .loader img").fadeIn(100);
        jQuery('.Updt_Acc .result').removeAttr('style');
        jQuery.post('http://adminpea.openinfotech.org/webservice/Updt_AccInfo.php', 
                {
                    Usr_NM: jQuery('#Usr_NM').val(),
                    Party_ID: jQuery('#Party_ID').val(),
                    Position_ID: jQuery('#Position_ID').val(),
                    Password: jQuery('#Acc_Password').val(),
                },
        function(rez) {


//            var rez = JSON.parse(response);
            jQuery('.Updt_Acc .result')
                    .toggleClass('sc_infobox_style_error', false)
                    .toggleClass('sc_infobox_style_success', false);
            if (rez.success == 1) {
                jQuery('.Updt_Acc .result').addClass('sc_infobox_style_success').html('Profile Updated Successfully!');
//                setTimeout("jQuery('Updt_Info').trigger('click'); jQuery('.Updt_Info').trigger('click');", 2000);

                // jQuery('#Problem_Title').val('');
                //jQuery('#Problem_Text').val('');


                setTimeout('window.location.reload();', 500);
            } else {
                jQuery('.Updt_Acc .result').addClass('sc_infobox_style_error').html('Invalied Password !');
            }

//            console.log("session destroys");
//            location.reload();
//            
//            
            jQuery(".Updt_Acc .loader img").fadeOut(200);
        }, 'json');



    }
    
    
    // Update Password ...
    
    jQuery('.Updt_Pass #hit_1').click(function(e) {

        console.log('click');
        Check_Pass();
        //e.preventDefault();
        return false;
    });
    // Check Info to Update ..
    function Check_Pass() {
        var error = formValidate(jQuery(".Updt_Pass"), {
            error_message_show: true,
            error_message_time: 5000,
            error_message_class: "sc_infobox sc_infobox_style_error",
            error_fields_class: "error_fields_class",
            exit_after_first_error: true,
            rules: [
                {
                    field: "O_Password",
                    min_length: {value: 1, message: "The Password field can't be empty"},
                    max_length: {value: 20, message: "To long password"}
                }, 
                {
                    field: "N_Password",
                    min_length: {value: 1, message: "The Password field cant be empty"},
                    max_length: {value: 20, message: "To long password"}
                }, 
                {
                    field: "C_Password",
                    min_length: {value: 1, message: "The Password field cant be empty"},
                    equal_to: {value: 'N_Password', message: "The passwords in both fields are not equal"}
                }
            ]
        });

        if (!error) {
//            document.forms['registration_form'].submit();

            Update_Pass();
        }
    }
    function  Update_Pass() {

        jQuery(".Updt_Pass .loader img").fadeIn(100);
        jQuery('.Updt_Pass .result').removeAttr('style');
        jQuery.post('http://adminpea.openinfotech.org/webservice/Updt_Pass.php', 
                {
                    O_Password: jQuery('#O_Password').val(),
                    N_Password: jQuery('#N_Password').val(),
                },
        function(rez) {


//            var rez = JSON.parse(response);
            jQuery('.Updt_Pass .result')
                    .toggleClass('sc_infobox_style_error', false)
                    .toggleClass('sc_infobox_style_success', false);
            if (rez.success == 1) {
                jQuery('.Updt_Pass .result').addClass('sc_infobox_style_success').html('Profile Updated Successfully!');
//                setTimeout("jQuery('Updt_Info').trigger('click'); jQuery('.Updt_Info').trigger('click');", 2000);

                // jQuery('#Problem_Title').val('');
                //jQuery('#Problem_Text').val('');


                setTimeout('window.location.reload();', 500);
            } else {
                jQuery('.Updt_Pass .result').addClass('sc_infobox_style_error').html('Invalied Password !');
            }

//            console.log("session destroys");
//            location.reload();
//            
//            
            jQuery(".Updt_Pass .loader img").fadeOut(200);
        }, 'json');



    }
    

    jQuery('.add_opponents_form #enter').click(function(e) {

        console.log('click');
        AddOpponents();
        e.preventDefault();
        return false;
    });
    // Check for validity Register Form
    function AddOpponents() {
        var error = formValidate(jQuery(".add_opponents_form"), {
            error_message_show: true,
            error_message_time: 5000,
            error_message_class: "sc_infobox sc_infobox_style_error",
            error_fields_class: "error_fields_class",
            exit_after_first_error: true,
            rules: [
                {
                    field: "Opponent_Name",
                    min_length: {value: 1, message: "The Opponent Name field can\'t be empty"},
                    max_length: {value: 60, message: "Too long Opponent Name field"}
                }, {
                    field: "Opponent_Party",
                    min_length: {value: 1, message: "The Opponent Party field can\'t be empty"},
                    max_length: {value: 600, message: "Too long Opponent Party field"}
                }
            ]
        });

        if (!error) {
//            document.forms['registration_form'].submit();

            performAddOppenent();
        }
    }


    /**
     * This method is used for Admin registration
     * @returns {undefined}
     */
    function  performAddOppenent() {

        jQuery(".loader img").fadeIn(100);
        jQuery('.add_opponents_form .result').removeAttr('style');
        jQuery.post('http://adminpea.openinfotech.org/webservice/add-opponent.php',
                {
                    Oppenent_Name: jQuery('#Opponent_Name').val(),
                    Oppenent_Party: jQuery('#Opponent_Party').val(),
                    Election_Id: jQuery('#Election_Id').val(),
                },
                function(rez) {


//            var rez = JSON.parse(response);
                    jQuery('.add_opponents_form .result')
                            .toggleClass('sc_infobox_style_error', false)
                            .toggleClass('sc_infobox_style_success', false);
                    if (rez.success == 1) {
                        jQuery('.add_opponents_form .result').addClass('sc_infobox_style_success').html('Opponent Added Successfully !');
                        setTimeout("jQuery('.add_opponents_form .close').trigger('click'); jQuery('.login-popup-link').trigger('click');", 2000);

                        jQuery('#Opponent_Name').val('');
                        jQuery('#Opponent_Party').val('');


                        setTimeout('window.location.reload();', 500);
                    } else if (rez.success == -1) {
                        jQuery('.add_opponents_form .result').addClass('sc_infobox_style_error').html('Registration failed! ' + rez.message);


                    } else {
                        jQuery('.add_opponents_form .result').addClass('sc_infobox_style_error').html('Registration failed! ' + rez.message);
                    }
                    jQuery('.add_opponents_form .result').fadeIn(500);
                    setTimeout("jQuery('.add_opponents_form .result').fadeOut()", 6000);

//            console.log("session destroys");
//            location.reload();
//            
//            
                    jQuery(".loader img").fadeOut(200);
                }, 'json');



    }
    jQuery('.edit_problem #enter').click(function(e) {

        console.log(jQuery('.edit_problem #Edit_Problem_Title').val());
        console.log(jQuery('.edit_problem #Edit_Problem_Text').val());

        EditProblem();
        e.preventDefault();
        return false;
    });

    // Check for validity Register Form
    function EditProblem() {
        var error = formValidate(jQuery(".edit_problem"), {
            error_message_show: true,
            error_message_time: 5000,
            error_message_class: "sc_infobox sc_infobox_style_error",
            error_fields_class: "error_fields_class",
            exit_after_first_error: true,
            rules: [
                {
                    field: "Edit_Problem_Title",
                    min_length: {value: 1, message: "The Problem Title field can\'t be empty"},
                    max_length: {value: 60, message: "Too long Problem Title field"}
                }, {
                    field: "Edit_Problem_Text",
                    min_length: {value: 5, message: "The Problem Description field can\'t be empty"},
                    max_length: {value: 5000, message: "Too long Problem Description field"}
                }
            ]
        });

        if (!error) {
            //            document.forms['registration_form'].submit();

            performEditProblem();
        }
    }


    /**
     * This method is used for Admin registration
     * @returns {undefined}
     */
    function  performEditProblem() {

        jQuery(".loader img").fadeIn(100);
        jQuery('.edit_problem .result').removeAttr('style');
        jQuery.post('webservice/edit-campaign-problem.php',
                {
                    Problem_Title: jQuery('.edit_problem #Edit_Problem_Title').val(),
                    Problem_Text: jQuery('.edit_problem #Edit_Problem_Text').val(),
                    Problem_Id: jQuery('.edit_problem #Problem_Id').val()
                },
        function(rez) {


            //            var rez = JSON.parse(response);
            jQuery('.edit_problem .result')
                    .toggleClass('sc_infobox_style_error', false)
                    .toggleClass('sc_infobox_style_success', false);
            if (rez.success == 1) {
                jQuery('.edit_problem .result').addClass('sc_infobox_style_success').html('Problem Updated Successfully !');

                jQuery('.edit_problem #Problem_Title').val('');
                jQuery('.edit_problem #Problem_Text').val('');


                setTimeout('window.location.reload();', 500);
            } else {
                jQuery('.edit_problem .result').addClass('sc_infobox_style_error').html('Updation Failed !');
            }
            jQuery('.edit_problem .result').fadeIn(500);
            setTimeout("jQuery('.edit_problem .result').fadeOut()", 6000);

            //            console.log("session destroys");
            //            location.reload();
            //            
            //            
            jQuery(".loader img").fadeOut(200);
        }, 'json');



    }



    function formValidate(form, opt) {
        "use strict";
        var error_msg = '';
        form.find(":input").each(function() {
            if (error_msg !== '' && opt.exit_after_first_error) {
                return;
            }
            for (var i = 0; i < opt.rules.length; i++) {
                if (jQuery(this).attr("name") === opt.rules[i].field) {
                    var val = jQuery(this).val();
                    var error = false;
                    if (typeof (opt.rules[i].min_length) === 'object') {
                        if (opt.rules[i].min_length.value > 0 && val.length < opt.rules[i].min_length.value) {
                            if (error_msg === '') {
                                jQuery(this).get(0).focus();
                            }
                            error_msg += '<p class="error_item">' + (typeof (opt.rules[i].min_length.message) !== 'undefined' ? opt.rules[i].min_length.message : opt.error_message_text) + '</p>';
                            error = true;
                        }
                    }
                    if ((!error || !opt.exit_after_first_error) && typeof (opt.rules[i].max_length) === 'object') {
                        if (opt.rules[i].max_length.value > 0 && val.length > opt.rules[i].max_length.value) {
                            if (error_msg === '') {
                                jQuery(this).get(0).focus();
                            }
                            error_msg += '<p class="error_item">' + (typeof (opt.rules[i].max_length.message) !== 'undefined' ? opt.rules[i].max_length.message : opt.error_message_text) + '</p>';
                            error = true;
                        }
                    }
                    if ((!error || !opt.exit_after_first_error) && typeof (opt.rules[i].mask) === 'object') {
                        if (opt.rules[i].mask.value !== '') {
                            var regexp = new RegExp(opt.rules[i].mask.value);
                            if (!regexp.test(val)) {
                                if (error_msg === '') {
                                    jQuery(this).get(0).focus();
                                }
                                error_msg += '<p class="error_item">' + (typeof (opt.rules[i].mask.message) !== 'undefined' ? opt.rules[i].mask.message : opt.error_message_text) + '</p>';
                                error = true;
                            }
                        }
                    }
                    if ((!error || !opt.exit_after_first_error) && typeof (opt.rules[i].equal_to) === 'object') {
                        if (opt.rules[i].equal_to.value !== '' && val !== jQuery(jQuery(this).get(0).form[opt.rules[i].equal_to.value]).val()) {
                            if (error_msg === '') {
                                jQuery(this).get(0).focus();
                            }
                            error_msg += '<p class="error_item">' + (typeof (opt.rules[i].equal_to.message) !== 'undefined' ? opt.rules[i].equal_to.message : opt.error_message_text) + '</p>';
                            error = true;
                        }
                    }
                    if (opt.error_fields_class !== '') {
                        jQuery(this).toggleClass(opt.error_fields_class, error);
                    }
                }
            }
        });

       
        if (error_msg !== '' && opt.error_message_show) {
            error_msg_box = form.find(".result");
            if (error_msg_box.length === 0) {
                form.append('<div class="result"></div>');
                error_msg_box = form.find(".result");
            }
            if (opt.error_message_class) {
                error_msg_box.toggleClass(opt.error_message_class, true);
            }
            error_msg_box.html(error_msg).fadeIn();
            setTimeout(function() {
                error_msg_box.fadeOut();
            }, opt.error_message_time);
        }
        return error_msg !== '';
    }
    
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
                .width(150)
                .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }                               
});