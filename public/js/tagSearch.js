$(function() {
	// Input tags
	$('#tags_1').tagsInput({
		autocomplete_url: '/api/tags/tags.json',
		autocomplete:{ selectFirst:true, width:'auto', autoFill:true},
		height: "31px",
		width: "595px",
		defaultText: "Thêm tag",
		placeholderColor: "#666"
	});
});