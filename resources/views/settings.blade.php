@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/bootstrap/css/bootstrap.css', 'resources/bootstrap/js/bootstrap.js'])
@endif
<x-layout>
<div class="container mt-5">
        <h1 class="mb-4">Settings</h1>
        <div class="card shadow-sm p-4">
            <!-- Dark/Light Mode -->
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="darkModeToggle">
                <label class="form-check-label" for="darkModeToggle">Original Mode</label>
            </div>
            <!-- time zone settings -->
            <div class="settings-container">
                <h2 class="mb-4 text-center">Time Zone Settings</h2>
                <form id="timezone-form">
                    <div class="mb-3">
                        <label for="timezone" class="form-label">Select Time Zone</label>
                        <select class="form-select" id="timezone" required>
                            <option value="">Choose a time zone</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Save Time Zone</button>
                </form>
                <div id="success-message" class="alert alert-success d-none">
                    Time Zone updated successfully!
                </div>
            </div>

            <script>document.addEventListener('DOMContentLoaded', () => {
                    const timezoneSelect = document.getElementById('timezone');
                    const successMessage = document.getElementById('success-message');
                    const timeZones = Intl.supportedValuesOf('timeZone');

                    // Populate the time zone dropdown
                    timeZones.forEach((tz) => {
                        const option = document.createElement('option');
                        option.value = tz;
                        option.textContent = tz;
                        timezoneSelect.appendChild(option);
                    });

                    // Handle form submission
                    const timezoneForm = document.getElementById('timezone-form');
                    timezoneForm.addEventListener('submit', (e) => {
                        e.preventDefault();

                        const selectedTimeZone = timezoneSelect.value;

                        if (selectedTimeZone) {
                            // Simulate saving the timezone (e.g., to localStorage or backend)
                            localStorage.setItem('selectedTimeZone', selectedTimeZone);

                            // Display success message
                            successMessage.classList.remove('d-none');
                            successMessage.textContent = `Time Zone updated to ${selectedTimeZone}`;

                            // Optionally clear the message after a few seconds
                            setTimeout(() => {
                                successMessage.classList.add('d-none');
                            }, 3000);
                        }
                    });

                    // Load the saved timezone (if any)
                    const savedTimeZone = localStorage.getItem('selectedTimeZone');
                    if (savedTimeZone) {
                        timezoneSelect.value = savedTimeZone;
                    }
                });
                // Dark Mode Toggle
                const darkModeToggle = document.getElementById('darkModeToggle');
                darkModeToggle.addEventListener('change', () => {
                    document.body.classList.toggle('dark-mode');
                    localStorage.setItem('theme', document.body.classList.contains('dark-mode') ? 'dark' : 'light');
                });

                // Save Dark Mode Preference
                if (localStorage.getItem('theme') === 'dark') {
                    document.body.classList.add('dark-mode');
                    darkModeToggle.checked = true;
                }

                // Language Switch
                document.getElementById('languageEn').addEventListener('click', () => {
                    window.location.href = "/settings/change-language/en";
                });

                document.getElementById('languageAr').addEventListener('click', () => {
                    window.location.href = "/settings/change-language/ar";
                });
            </script>
    </script>
</x-layout>