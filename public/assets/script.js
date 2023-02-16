$( document ).ready(function() {
    const orderTaxnumber=$("#order_taxnumber");
    const orderProductid=$("#order_productid");
    const orderFullprice=$("#order_fullprice");
    const orderProductprice=$("#order_productprice");
    orderTaxnumber.inputmask({
        mask: 'aa999999999',
        casing: "upper",
        placeholder: ''
    })
    $.ajax({
        url: "/getProgucts/",
        method: 'GET',
        dataType: "html",
        success: function (data){
            let JSONData=JSON.parse(data);
            let Tax=0;
            let Price=JSONData[orderProductid.val()]['price'];
            orderProductprice.val(Price);
            orderFullprice.val(Price);
            orderTaxnumber.bind('change',function (){
                Price=JSONData[orderProductid.val()]['price'];
                let Country=orderTaxnumber.val().substring(0, 2);
                switch (Country.toUpperCase()){
                    case 'DE' : Price += (Price*0.19);
                        break;
                    case 'IT' : Price += (Price*0.22);
                        break;
                    case 'GR' : Price += (Price*0.24);
                        break;
                }
                orderFullprice.val(Price);
            })
            orderProductid.bind('change',function (){
                Price=JSONData[orderProductid.val()]['price'];
                let Country=orderTaxnumber.val().substring(0, 2);
                switch (Country.toUpperCase()){
                    case 'DE' : Price += (Price*0.19);
                        break;
                    case 'IT' : Price += (Price*0.22);
                        break;
                    case 'GR' : Price += (Price*0.24);
                        break;
                }
                orderProductprice.val(JSONData[orderProductid.val()]['price'])
                orderFullprice.val(Price);
            })
            // console.log(JSONData)
        }});
});