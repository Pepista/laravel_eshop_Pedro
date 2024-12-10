<div class="py-16">
    <h2 class="text-4xl font-semibold text-center text-white-800">Kontaktní formulář</h2>
    <form class="max-w-lg mx-auto mt-8 p-8 bg-white shadow-lg rounded-lg" action="#" method="POST">
        @csrf
        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-gray-700">Jméno</label>
            <input type="text" id="name" name="name" class="border border-gray-300 rounded-md w-full p-4 mt-2" required>
        </div>
        <div class="mb-6">
            <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
            <input type="email" id="email" name="email" class="border border-gray-300 rounded-md w-full p-4 mt-2" required>
        </div>
        <div class="mb-6">
            <label for="message" class="block text-sm font-medium text-gray-700">Zpráva</label>
            <textarea id="message" name="message" class="border border-gray-300 rounded-md w-full p-4 mt-2" required></textarea>
        </div>
        <button type="submit" class="bg-indigo-600 text-white rounded-md px-6 py-3 hover:bg-indigo-700 transition duration-200 w-full">Odeslat</button>
    </form>
</div>