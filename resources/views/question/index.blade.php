@extends('layouts.app')

@section('content')
<div class="h-20"> </div>
<div class="container mx-auto py-10">
    <h1 class="text-5xl font-semibold text-center mb-8 text-white">Časté dotazy</h1>
    <div class="space-y-6">
        <!-- 1. Otázka -->
        <div>
            <button class="w-full text-left text-xl font-medium text-white bg-gray-700 px-6 py-4 rounded-lg flex justify-between items-center"
                    onclick="toggleAnswer(this)">
                Jak dlouho trvá zpracování mé objednávky?
                <span class="ml-4">+</span>
            </button>
            <div class="hidden mt-2 text-white px-6">
                Zpracování objednávky obvykle trvá 1-2 pracovní dny.
            </div>
        </div>

        <!-- 2. Otázka -->
        <div>
            <button class="w-full text-left text-xl font-medium text-white bg-gray-700 px-6 py-4 rounded-lg flex justify-between items-center"
                    onclick="toggleAnswer(this)">
                Mohu změnit svou objednávku po jejím potvrzení?
                <span class="ml-4">+</span>
            </button>
            <div class="hidden mt-2 text-white px-6">
                Po potvrzení objednávky již není možné provést změny, ale můžete nás kontaktovat, pokud se objeví nějaký problém.
            </div>
        </div>

        <!-- 3. Otázka -->
        <div>
            <button class="w-full text-left text-xl font-medium text-white bg-gray-700 px-6 py-4 rounded-lg flex justify-between items-center"
                    onclick="toggleAnswer(this)">
                Jak mohu sledovat stav své objednávky?
                <span class="ml-4">+</span>
            </button>
            <div class="hidden mt-2 text-white px-6">
                Po odeslání objednávky obdržíte e-mail s odkazem na sledování zásilky.
            </div>
        </div>

        <!-- 4. Otázka -->
        <div>
            <button class="w-full text-left text-xl font-medium text-white bg-gray-700 px-6 py-4 rounded-lg flex justify-between items-center"
                    onclick="toggleAnswer(this)">
                Jak mohu vrátit nebo vyměnit zboží?
                <span class="ml-4">+</span>
            </button>
            <div class="hidden mt-2 text-white px-6">
                Pokud chcete vrátit nebo vyměnit produkt, kontaktujte nás a my vám poskytneme pokyny.
            </div>
        </div>

        <!-- 5. Otázka -->
        <div>
            <button class="w-full text-left text-xl font-medium text-white bg-gray-700 px-6 py-4 rounded-lg flex justify-between items-center"
                    onclick="toggleAnswer(this)">
                Nabízíte dopravu zdarma?
                <span class="ml-4">+</span>
            </button>
            <div class="hidden mt-2 text-white px-6">
                Ano, nabízíme dopravu zdarma pro objednávky nad 1000 Kč.
            </div>
        </div>

        <!-- 6. Otázka -->
        <div>
            <button class="w-full text-left text-xl font-medium text-white bg-gray-700 px-6 py-4 rounded-lg flex justify-between items-center"
                    onclick="toggleAnswer(this)">
                Jaké způsoby platby přijímáte?
                <span class="ml-4">+</span>
            </button>
            <div class="hidden mt-2 text-white px-6">
                Akceptujeme platby kartou, bankovním převodem, a PayPal.
            </div>
        </div>

        <!-- 7. Otázka -->
        <div>
            <button class="w-full text-left text-xl font-medium text-white bg-gray-700 px-6 py-4 rounded-lg flex justify-between items-center"
                    onclick="toggleAnswer(this)">
                Je moje objednávka bezpečně uložena?
                <span class="ml-4">+</span>
            </button>
            <div class="hidden mt-2 text-white px-6">
                Ano, vaše objednávka je bezpečně uložena a všechny platby jsou šifrovány.
            </div>
        </div>

        <!-- 8. Otázka -->
        <div>
            <button class="w-full text-left text-xl font-medium text-white bg-gray-700 px-6 py-4 rounded-lg flex justify-between items-center"
                    onclick="toggleAnswer(this)">
                Jak mohu kontaktovat zákaznickou podporu?
                <span class="ml-4">+</span>
            </button>
            <div class="hidden mt-2 text-white px-6">
                Můžete nás kontaktovat prostřednictvím e-mailu na support@firma.cz nebo telefonicky na čísle 123 456 789.
            </div>
        </div>

        <!-- 9. Otázka -->
        <div>
            <button class="w-full text-left text-xl font-medium text-white bg-gray-700 px-6 py-4 rounded-lg flex justify-between items-center"
                    onclick="toggleAnswer(this)">
                Nabízíte dárkové karty?
                <span class="ml-4">+</span>
            </button>
            <div class="hidden mt-2 text-white px-6">
                Ano, nabízíme dárkové karty, které si můžete zakoupit na našich stránkách.
            </div>
        </div>

        <!-- 10. Otázka -->
        <div>
            <button class="w-full text-left text-xl font-medium text-white bg-gray-700 px-6 py-4 rounded-lg flex justify-between items-center"
                    onclick="toggleAnswer(this)">
                Jaké jsou podmínky vrácení peněz?
                <span class="ml-4">+</span>
            </button>
            <div class="hidden mt-2 text-white px-6">
                Nabízíme vrácení peněz do 30 dnů od zakoupení, pokud produkt není použitý.
            </div>
        </div>

        <!-- 11. Otázka -->
        <div>
            <button class="w-full text-left text-xl font-medium text-white bg-gray-700 px-6 py-4 rounded-lg flex justify-between items-center"
                    onclick="toggleAnswer(this)">
                Co mám dělat, když jsem obdržel poškozený produkt?
                <span class="ml-4">+</span>
            </button>
            <div class="hidden mt-2 text-white px-6">
                Pokud jste obdrželi poškozený produkt, kontaktujte nás co nejdříve pro výměnu nebo vrácení peněz.
            </div>
        </div>

        <!-- 12. Otázka -->
        <div>
            <button class="w-full text-left text-xl font-medium text-white bg-gray-700 px-6 py-4 rounded-lg flex justify-between items-center"
                    onclick="toggleAnswer(this)">
                Jaké jsou vaše obchodní podmínky a zásady ochrany osobních údajů?
                <span class="ml-4">+</span>
            </button>
            <div class="hidden mt-2 text-white px-6">
                Naše obchodní podmínky a zásady ochrany osobních údajů najdete na stránce "Podmínky" na našem webu.
            </div>
        </div>

        <!-- 13. Otázka -->
        <div>
            <button class="w-full text-left text-xl font-medium text-white bg-gray-700 px-6 py-4 rounded-lg flex justify-between items-center"
                    onclick="toggleAnswer(this)">
                Kde najdu informace o vaší velikostní tabulce?
                <span class="ml-4">+</span>
            </button>
            <div class="hidden mt-2 text-white px-6">
                Velikostní tabulku naleznete na stránce produktu v sekci "Velikosti".
            </div>
        </div>
    </div>
</div>

<script>
function toggleAnswer(button) {
    const answer = button.nextElementSibling;
    const isHidden = answer.classList.contains('hidden');
    answer.classList.toggle('hidden');
    button.querySelector('span').textContent = isHidden ? '−' : '+';
}
</script>
@endsection
