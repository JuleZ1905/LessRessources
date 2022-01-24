$(document).ready(function() {
    // Toggle menu on click

    $(".trash").click(function() {
        if (confirm("Sind Sie sich sicher?")) {
            var row = $(this).closest("tr"); // Find the row
            var ressource = row.find(".ressource").text();
            var amount = row.find(".amount").text();
            var unit = row.find(".unit").text();
            var month = row.find(".month").text();
            switch (month) {
                case "Januar":
                    month = 1;
                    break;
                case "Februar":
                    month = 2;
                    break;
                case "März":
                    month = 3;
                    break;
                case "April":
                    month = 4;
                    break;
                case "Mai":
                    month = 5;
                    break;
                case "Juni":
                    month = 6;
                    break;
                case "Juli":
                    month = 7;
                    break;
                case "August":
                    month = 8;
                    break;
                case "September":
                    month = 9;
                    break;
                case "Oktober":
                    month = 10;
                    break;
                case "November":
                    month = 11;
                    break;
                case "Dezember":
                    month = 12;
                    break;
                default:
                    console.log("Default activated");
                    break;
            }

            var year = row.find(".year").text();

            let data = {
                ressource: ressource,
                amount: amount,
                unit: unit,
                month: month,
                year: year,
            };

            $.post("admin.php", data).done(function() {
                window.location.reload();
            });
        }
    });

    $("#menu-toggler").click(function() {
        toggleBodyClass("menu-active");
    });

    function toggleBodyClass(className) {
        document.body.classList.toggle(className);
    }




    $(document).ready(function(){

        var $randomnbr = $('.nbr');
        var $timer= 20;
        var $it;
        var $data = 0;
        var index;
        var change;
        var letters = ["A", "d", "m", "i", "n", "-", "P", "a", "n", "e", "l"];

        $randomnbr.each(function(){

            change = Math.round(Math.random()*100);
            $(this).attr('data-change', change);

        });

        function random(){
            return Math.round(Math.random()*9);
        };

        function select(){
            return Math.round(Math.random()*$randomnbr.length+1);
        };

        function value(){
            $('.nbr:nth-child('+select()+')').html(''+random()+'');
            $('.nbr:nth-child('+select()+')').attr('data-number', $data);
            $data++;

            $randomnbr.each(function(){
                if(parseInt($(this).attr('data-number')) > parseInt($(this).attr('data-change'))){
                    index = $('.ltr').index(this);
                    $(this).html(letters[index]);
                    $(this).removeClass('nbr');
                }
            });

        };

        $it = setInterval(value, $timer);

    });
});