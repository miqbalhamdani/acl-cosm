function deleteItem(url, id) {
	swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Yes, delete it!'
	}).then(function (result) {
		if (result.value) {
			$.ajax({
				type: "GET",
				url: `${url}/delete/${id}`,
				success: function () {
					swal.fire({
						title: 'Deleted',
						text: 'Your data was successfully deleted!',
						type: 'success'
					}).then(function () {
						window.location.reload();
					});
				},
				failure: function () {
					swal.fire(
						'Oops',
						'We couldnt connect to the server!',
						'error'
					);
				}
			})
		}
	});
}
