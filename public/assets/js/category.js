function showSubcategory(id, row, categoryName) {
	$(".col-md-3").removeClass("border border-success");
	$(".subcategory-row").hide();
	$.ajax({
				url : "ajax/get-subcategory.php",
				type : "POST",
				data : "category-id=" + id +"&name=" + categoryName,
				success : function(response) {
					$("#cat-id-" + id).addClass("border border-success");
					$(".subcategory-row").removeClass("d-none");
					$(".subcategory-row").html("");
					var parent = $("#category-row-" + row);
				    parent.find(".subcategory-row").append(response);					
					parent.find(".subcategory-row").slideToggle();
					$("#closeWindow").on('click', function() {
						$("#cat-id-" + id).removeClass("border border-success");
								$(".subcategory-row").slideUp();
							});
				}
			});
}