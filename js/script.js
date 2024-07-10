// Cart
$("#btncod").click(function(){
    clearForm();
    $("#showPayment").css("visibility","visible");
    $("#pay").text("Place Order");
    $("#paymenttxt").text("Cash On Delivery");
    $(".account").css("visibility","hidden");
    $(".password").css("visibility","hidden");
    $(".pin").css("visibility","hidden");
    $("#pay").css({"margin-bottom":"10%"});
    $("#method").val("Cash On Delivery");
    $("#shippiamount").css("display", "none");

})


$("#btngcash").click(function(){
    clearForm();
    $("#showPayment").css("visibility","visible");
    $(".account").text("Account Number");
    $(".account").css("visibility","visible");
    $(".password").css("visibility","visible");
    $(".pin").css("visibility","hidden");
    $("#pay").text("Pay");
    $("#paymenttxt").text("GCash");
    $("#pay").css({"margin-bottom":"5%"});
    $("#method").val("GCash");
    $("#shippiamount").css("display", "none");
    
    
})

$("#btncard").click(function(){
    clearForm();
    $("#showPayment").css("visibility","visible");
    $(".account").text("Account Number");
    $(".account").css("visibility","visible");
    $(".password").css("visibility","visible");
    $(".pin").css("visibility","hidden");
    $("#pay").text("Pay");
    $("#paymenttxt").text("Debit Card");
    $("#pay").css({"margin-bottom":"0%"});
    $("#method").val("Debit Card");
    $("#shippiamount").css("display", "none");
    
   
})

$("#btnwallet").click(function(){
    clearForm();
    $("#showPayment").css("visibility","visible");
    $(".account").text("Available Balance");
    $(".account").css("visibility","visible");
    $("#accountval").css("visibility", "hidden");
    $(".password").css("visibility","visible");
    $(".pin").css("visibility","visible");
    $("#pay").text("Pay");
    $("#paymenttxt").text("Shippi Wallet");
    $("#pay").css({"margin-bottom":"0%"});
    $("#shippiamount").css({"display":"block","padding-bottom":"-20px"});
    $("#method").val("Shippi Wallet");
    
    
})


$("#cart").click(function(){
    if($("#cart").val() < 1){
        alert("Cart is Empty");
        
    }else{
        window.location="../modules/cart.php";
    }
})


function clearForm(){
    $("#password").val("");
    $("#pin").val("");
    $("#accountval").val("");
}

//Sales



function peekSearchSales(){
    var value = $("#search_key").val().toLowerCase();
    $("#salesList tbody tr").filter(function(){
        $(this).toggle($(this).text().toLowerCase().indexOf(value)>-1)
    });
}


//Customer
$("#verifyCustomer").submit(function(e){
    var password = $('#password').val();
    var vpassword = $('#vpassword').val();
    var pin = $('#pin').val();
    var vpin = $('#vpin').val();


    if((password == vpassword)&&(pin == vpin)){
        alert("Operation Succesful");
    }else{
        alert("Pin/Password is not the same. Try again");
        e.preventDefault();

    }

})

$("#addCustomer").click(function(){
    $("#modalTitle").text("Add Customer");
    $("#save").text("Add");
    $("#save").attr("name","addCustomer");
    
})


$("#customerList").on('click', '.edit',function(){
    //get current row
    $("#modalTitle").text("Edit Customer");
    $("#save").text("Edit");
    $("#save").attr("name","editCustomer");

    var currentCustomer = $(this).closest('tr');
    
    var name = currentCustomer.find("td:eq(0)").text();
    var address = currentCustomer.find("td:eq(1)").text();
    var gcash = currentCustomer.find("td:eq(2)").text();
    var card  = currentCustomer.find("td:eq(3)").text();
    var wallet = currentCustomer.find("td:eq(4)").text();
    var customerID = ($(this).closest('tr').attr("customerID"));

    $("#name").val(name);
    $("#address").val(address);
    $("#gcash").val(gcash);
    $("#card").val(card);
    $("#wallet").val(wallet);
    $("#formIDCustomer").val(customerID);
    

})


$("#xCustomer").click(function(){
    clearCustomerForm(); 
})
$("#closeCustomer").click(function(){
    clearCustomerForm(); 
})



function clearCustomerForm(){
    $("#name").val("");
    $("#address").val("");
    $("#gcash").val("");
    $("#wallet").val("");
    $("#pin").val("");
    $("#vpin").val("");
    $("#card").val("");
    $("#password").val("");
    $("#vpassword").val("");
    $("#usernameC").val("");
}

function peekSearchCustomer(){
    var value = $("#search_key").val().toLowerCase();
    $("#customerList tbody tr").filter(function(){
        $(this).toggle($(this).text().toLowerCase().indexOf(value)>-1)
    });
}


//Product

$("#addProduct").click(function(){
    $("#modalTitle").text("Add Product");
    $("#save").text("Add");
    $("#save").attr("name","addProduct");
    
})

$("#xProduct").click(function(){
    clearProductForm(); 
})
$("#closeProduct").click(function(){
    clearProductForm(); 
})


$("#productList").on('click', '.edit',function(){
    //get current row
    $("#modalTitle").text("Edit Product");
    $("#save").text("Edit");
    $("#save").attr("name","editProduct");

    var currentProduct = $(this).closest('tr');
    
    var productname = currentProduct.find("td:eq(0)").text();
    var price = currentProduct.find("td:eq(1)").text();
    var variation = currentProduct.find("td:eq(2)").text();
    var variation = currentProduct.find("td:eq(2)").text();
    var productid = ($(this).closest('tr').attr("productid"));

    $("#productname").val(productname);
    $("#price").val(price);
    $("#variation").val(variation);
    $("#formIDProduct").val(productid);

})


function peekSearchProduct(){
    var value = $("#search_key").val().toLowerCase();
    $("#productList tbody tr").filter(function(){
        $(this).toggle($(this).text().toLowerCase().indexOf(value)>-1)
    });
}

function clearProductForm(){
    $("#productname").val("");
    $("#price").val("");
    $("#variation").val("");
    $("#image").val("");
}


//Accounts

$("#verifyAccount").submit(function(e){
    var password = $('#accpassword').val();
    var vpassword = $('#vaccpassword').val();


    if(password == vpassword){
        alert("Operation Succesful");
    }else{
        alert("Pin/Password is not the same. Try again");
        e.preventDefault();

    }

})

$("#addAccount").click(function(){
    $("#modalTitle").text("Add Account");
    $("#save").text("Add");
    $("#save").attr("name","addAccount");
    
})

$("#xAccount").click(function(){
    clearAccountForm(); 
})
$("#closeAccount").click(function(){
    clearAccountForm(); 
})


$("#accountList").on('click', '.edit',function(){
    //get current row
    $("#modalTitle").text("Edit Account");
    $("#save").text("Edit");
    $("#save").attr("name","editAccount");

    var currentProduct = $(this).closest('tr');
    
    var name = currentProduct.find("td:eq(0)").text();
    var username = currentProduct.find("td:eq(1)").text();
    var remarks = currentProduct.find("td:eq(2)").text();
    var accountID= ($(this).closest('tr').attr("accountID"));

    $("#accname").val(name);
    $("#username").val(username);
    $("#remarks").val(remarks);
    $("#formIDAccount").val(accountID);

})

function peekSearchAccount(){
    var value = $("#search_key").val().toLowerCase();
    $("#accountList tbody tr").filter(function(){
        $(this).toggle($(this).text().toLowerCase().indexOf(value)>-1)
    });
}

function clearAccountForm(){
    $("#accname").val("");
    $("#username").val("");
    $("#remarks").val("");
    $("#accpassword").val("");
    
}

//Cart
$("#payForm").submit(function(e){
    var totalAmount = $("#totalprice").val();
    if(totalAmount < 1){
        alert("Cart is empty");
        window.location="../modules/order.php";
        e.preventDefault();
        
    }

})



//Dashboard Elements


//header
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function dropDown() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  // Close the dropdown menu if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
}


//Print Report

$("#printSales").click(function(){
    window.open("../extensions/tcpdf/pdf/saleslist.php","_blank")
});


$("#printCustomers").click(function(){
    window.open("../extensions/tcpdf/pdf/customerlist.php","_blank")
});

$("#printProducts").click(function(){
    window.open("../extensions/tcpdf/pdf/productlist.php","_blank")
});

$("#printAccount").click(function(){
    window.open("../extensions/tcpdf/pdf/accountlist.php","_blank")
});


//Login
function displayTime(){
    const today = new Date();
    let h = today.getHours();
    let m = today.getMinutes();
    let s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById("time").innerHTML =  h + ":" + m + ":" + s;
    setTimeout(displayTime, 1000);
}

function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}

function displayDate()
{
    var d = new Date();
    var date = d.getDate();
    var year = d.getFullYear();
    var month = d.getMonth();
    var monthArr = ["January", "February","March", "April", "May", "June", "July", "August", "September", "October", "November","December"];
    month = monthArr[month];
    document.getElementById("date").innerHTML=month+" "+date+", "+year;
}

function displayDT(){
    displayTime();
    displayDate();
}


