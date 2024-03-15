<!DOCTYPE html>
<html>
<head>
    <!-- your head content -->
</head>
<body id="body">
    <nav class="navbar navbar-expand-sm bg-white mx-3 mt-3">
        <!-- your navbar content -->
    </nav>
    <section>
        <!-- your section content -->
    </section>
    <button id="darkModeButton" class="btn btn-primary">🌙 Dark Mode</button>
    <script>
        // Function to toggle dark mode
        function toggleDarkMode() {
            $("#body").toggleClass("dark-mode");
            // You can add more elements to toggle here if needed
        }

        $(document).ready(function() {
            $("#darkModeButton").click(function() {
                toggleDarkMode();
            });
        });
    </script>
</body>
</html>
