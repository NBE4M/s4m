    function CheckBoth() {
        if (document.getElementById("bothsame").checked == true) {
            var Name = document.getElementById("Name").value;
            var Designation = document.getElementById("Designation").value;
            var Office_Address = document.getElementById("Office_Address").value;
            var Email = document.getElementById("Email").value;
            var Mobile_number = document.getElementById("Mobile_number").value;
            document.getElementById("sName").value = Name;
            document.getElementById("sDesignation").value = Designation;
            document.getElementById("sOffice_Address").value = Office_Address;
            document.getElementById("sEmail").value = Email;
            document.getElementById("sMobile_number").value = Mobile_number;
        }
        else {
            document.getElementById("sName").value = "";
            document.getElementById("sDesignation").value = "";
            document.getElementById("sOffice_Address").value = "";
            document.getElementById("sEmail").value = "";
            document.getElementById("sMobile_number").value = "";
        }   
    }
    function CheckBoth_payment() {
        if (document.getElementById("bothsame_payment").checked == true) {
            var name = document.getElementById("name").value;
            var company = document.getElementById("company").value;
            var designation = document.getElementById("designation").value;
            var address1 = document.getElementById("address1").value;
            var address2 = document.getElementById("address2").value;
            var address3 = document.getElementById("address3").value;
            var city = document.getElementById("city").value;
            var state = document.getElementById("state").value;
            var country = document.getElementById("country").value;
            var zipcode = document.getElementById("zipcode").value;
            var mobile = document.getElementById("mobile").value;
            var email = document.getElementById("email").value;
            document.getElementById("bname").value = name;
            document.getElementById("bcompany").value = company;
            document.getElementById("bdesignation").value = designation;
            document.getElementById("baddress1").value = address1;
            document.getElementById("baddress2").value = address2;
            document.getElementById("baddress3").value = address3;
            document.getElementById("bcity").value = city;
            document.getElementById("bstate").value = state;
            document.getElementById("bcountry").value = country;
            document.getElementById("bzipcode").value = zipcode;
            document.getElementById("bmobile").value = mobile;
            document.getElementById("bemail").value = email;
        }
        else {
            document.getElementById("bname").value = "";
            document.getElementById("bcompany").value = "";
            document.getElementById("bdesignation").value = "";
            document.getElementById("baddress1").value = "";
            document.getElementById("baddress2").value = "";
            document.getElementById("baddress3").value = "";
            document.getElementById("bcity").value = "";
            document.getElementById("bstate").value = "";
            document.getElementById("bcountry").value = "";
            document.getElementById("bzipcode").value = "";
            document.getElementById("bmobile").value = "";
            document.getElementById("bemail").value = "";
        }   
    }

$(document).on('click',"#print",function(){
        var originalContents = $("body").html();
        var printContents = $("#ptn").html();
        var ptnCnt = "<center>Nomination Details</center>"+printContents;
        //alert(originalContents);
        $("body").html(ptnCnt);
      window.print();
     $("body").html(originalContents);
        return false;
});
          