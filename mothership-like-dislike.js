document.addEventListener('DOMContentLoaded', function () {
    // Get all like and dislike buttons
    const likeButtons = document.querySelectorAll('.like-btn');
    const dislikeButtons = document.querySelectorAll('.dislike-btn');

    // Add click event listeners to the like buttons
    likeButtons.forEach((button) => {
        button.addEventListener('click', function () {
            const postId = this.dataset.postId;
            const nonce = mothership_ajax_obj.nonce;
            const likeCountElement = this.querySelector('.like-count');

            // Disable the like button
            this.disabled = true;

            // Send AJAX request to update the like count
            fetch(mothership_ajax_obj.ajax_url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    action: 'mothership_update_like_count',
                    post_id: postId,
                    security: nonce,
                }),
            })
                .then((response) => response.json())
                .then((data) => {
                    // Update the like count in the UI
                    if (data.success) {
                        likeCountElement.textContent = data.data.like_count;
                    }
                });
        });
    });

    // Add click event listeners to the dislike buttons
    dislikeButtons.forEach((button) => {
        button.addEventListener('click', function () {
            const postId = this.dataset.postId;
            const nonce = mothership_ajax_obj.nonce;
            const dislikeCountElement = this.querySelector('.dislike-count');

            // Disable the dislike button
            this.disabled = true;

            // Send AJAX request to update the dislike count
            fetch(mothership_ajax_obj.ajax_url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    action: 'mothership_update_dislike_count',
                    post_id: postId,
                    security: nonce,
                }),
            })
                .then((response) => response.json())
                .then((data) => {
                    // Update the dislike count in the UI
                    if (data.success) {
                        dislikeCountElement.textContent = data.data.dislike_count;
                    }
                });
        });
    });
});
