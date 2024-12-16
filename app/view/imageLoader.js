
$(document).ready(function() {
	
	$(".preview-image").click(function() {
		var clickedImg = $(this);
		const fileInput = $('<input>', { type: 'file', accept: 'image/*', style: 'display: none' });
		fileInput.on('change', function(event) {
			const file = event.target.files[0];
			if (file) {
				const reader = new FileReader();
				reader.onload = function(e) {
					const base64 = e.target.result;
					clickedImg.attr("src", base64);
					$("#fotoP").val(base64);
					console.log(base64);
				};
				reader.readAsDataURL(file);
			}
		});
		fileInput.click();
	});

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

