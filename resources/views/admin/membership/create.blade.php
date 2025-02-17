<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Membership 🚀</title>
    <!-- Bootstrap 5 & SweetAlert2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            border-radius: 15px;
            background: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card p-4 text-center">
        <h2 class="text-primary">🚀 Add Membership</h2>
        <p class="text-muted">Join us and be part of something great!</p>
        <form action="{{ route('membership.store') }}" method="POST" id="membershipForm">
            @csrf
            <div class="mb-3 text-start">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="mb-3 text-start">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3 text-start">
                <label for="membership_type" class="form-label">Membership Type</label>
                <input type="text" id="membership_type" name="membership_type" class="form-control" required>
            </div>

            <div class="mb-3 text-start">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success w-100">✅ Add Membership</button>
        </form>
    </div>
</div>

<!-- Stylish Easter Egg Alert -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(() => {
            Swal.fire({
                title: "🎉 Welcome!",
                text: "Enjoy your membership journey! 🚀",
                icon: "success",
                confirmButtonText: "Let's Go!"
            });
        }, 1000);
    });

    document.getElementById("membershipForm").addEventListener("submit", function(event) {
        event.preventDefault();
        Swal.fire({
            title: "Confirm Submission",
            text: "Are you sure you want to add this membership?",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Yes, Add it!",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        });
    });
</script>

<!-- Bootstrap 5 JavaScript CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
