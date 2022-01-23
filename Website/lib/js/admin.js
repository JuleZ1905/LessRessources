$(document).ready(function() {
    $(".trash").click(function() {
        if (confirm("Sind Sie sich sicher?")) {
            var row = $(this).closest("tr"); // Find the row
            var ressource = row.find(".ressource").text();
            var amount = row.find(".amount").text();
            var unit = row.find(".unit").text();
            var month = row.find(".month").text();
            var year = row.find(".year").text();

            let data = {
                ressource: ressource,
                amount: amount,
                unit: unit,
                month: month,
                year: year,
            };

            $.post('admin.php', data).done(function() {
                window.location.reload();
            });
        }
    });
});