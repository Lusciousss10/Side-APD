<x-apps-layout>
    <body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">
        <section class="max-w-3xl mx-auto py-10 px-6">
            <header class="mb-8">
                <h2 class="text-2xl font-semibold">
                    Profile Information
                </h2>
                <p class="mt-2 text-sm">
                    Update your account's profile information and email address.
                </p>
            </header>

            <form method="post" action="#" class="space-y-6">
                <div>
                    <label for="name" class="block text-sm font-medium">Name</label>
                    <input id="name" name="name" type="text" required autofocus
                        class="mt-1 block w-full bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium">Email</label>
                    <input id="email" name="email" type="email" required
                        class="mt-1 block w-full bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save
                    </button>
                    <p class="text-sm">Saved.</p>
                </div>
            </form>
        </section>

        <!-- Optional JavaScript to toggle dark mode -->
        <script>
            const toggleDarkMode = () => {
                document.documentElement.classList.toggle('dark');
                document.title = document.documentElement.classList.contains('dark') ? 'Update Profile (Dark Mode)' : 'Update Profile (Light Mode)';
            }
        </script>
    </body>
</x-apps-layout>
