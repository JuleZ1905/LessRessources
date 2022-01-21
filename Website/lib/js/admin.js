$(document).ready(function() {
    $(".trash").click(function() {
        var row = $(this).closest("tr"); // Find the row
        var ressource = row.find(".ressource").text();
        var amount = row.find(".amount").text();
        var unit = row.find(".unit").text();
        var from = row.find(".from").text();
        var to = row.find(".to").text();

        let data = {
            ressource: ressource,
            amount: amount,
            unit: unit,
            from: from,
            to: to,
        };
        $.post('admin.php', data);

        // Let's test it out
        alert(ressource + " " + amount + " " + unit + " " + from + " " + to);
    });
});