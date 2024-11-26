// carrinho

$(document).ready(function() {
    $(".product-card-img").each(function() {
        const defaultImage = $(this).attr("image");
        const hoverImage = $(this).attr("image-hover");
        $(this).css("background-image", `url(${defaultImage})`);
        $(this).hover(
            function() {
                $(this).css("background-image", `url(${hoverImage})`);
            },
            function() {
                $(this).css("background-image", `url(${defaultImage})`);
            }
        );
    });

    $(".icon-mercado").click(function() {
        const cardId = $(this).closest(".product-card").attr("id");
        alert("Ícone clicado no card: " + cardId);
    });
});
