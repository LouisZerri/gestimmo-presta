@extends('layouts.app')

@section('title', "Barème d'honoraires | GEST'IMMO")

@section('content')

    {{-- HERO --}}
    <div class="bg-gradient-to-br from-brand-blue to-blue-900 py-12 sm:py-16 md:py-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="max-w-3xl">
                <nav class="text-blue-200 text-xs sm:text-sm mb-4 sm:mb-6">
                    <a href="{{ route('home') }}" class="hover:text-white transition">Accueil</a>
                    <span class="mx-2">/</span>
                    <span class="text-white">Barème d'honoraires</span>
                </nav>
                <h1 class="font-heading font-extrabold text-2xl sm:text-3xl md:text-4xl lg:text-5xl text-white mb-3 sm:mb-4">
                    Barème d'honoraires
                </h1>
                <p class="text-blue-100 text-base sm:text-lg">
                    Conformément à l'arrêté du 10 janvier 2017, nous affichons nos honoraires de manière claire et transparente.
                </p>
            </div>
        </div>
    </div>

    {{-- CONTENU PRINCIPAL --}}
    <div class="bg-gray-50 py-10 sm:py-12 md:py-16">
        <div class="max-w-5xl mx-auto px-4">

            {{-- INTRODUCTION --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 sm:p-8 mb-6 sm:mb-8">
                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-3 sm:gap-4 text-center sm:text-left">
                    <div class="w-12 h-12 bg-blue-50 rounded-full flex items-center justify-center text-brand-blue flex-shrink-0">
                        <i class="fas fa-info-circle text-xl"></i>
                    </div>
                    <div>
                        <h2 class="font-heading font-bold text-lg sm:text-xl text-gray-900 mb-2">Honoraires de transaction immobilière</h2>
                        <p class="text-gray-600 text-sm sm:text-base">
                            Les honoraires ci-dessous s'appliquent aux transactions immobilières réalisées par les conseillers du réseau GEST'IMMO France.
                        </p>
                    </div>
                </div>
            </div>

            {{-- TABLEAU DES HONORAIRES --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-6 sm:mb-8">
                <div class="bg-brand-blue px-5 sm:px-8 py-3 sm:py-4">
                    <h3 class="font-heading font-bold text-white text-base sm:text-lg">Barème des honoraires de vente</h3>
                </div>

                {{-- Version mobile : liste de cards --}}
                <div class="md:hidden p-4 space-y-3">
                    @php
                        $honoraires = [
                            ['prix' => 'Jusqu\'à 19 999 €', 'taux' => '10 000 € TTC'],
                            ['prix' => '20 000 € à 39 999 €', 'taux' => '25% TTC'],
                            ['prix' => '40 000 € à 59 999 €', 'taux' => '17% TTC'],
                            ['prix' => '60 000 € à 79 999 €', 'taux' => '12,5% TTC'],
                            ['prix' => '80 000 € à 99 999 €', 'taux' => '10% TTC'],
                            ['prix' => '100 000 € à 119 999 €', 'taux' => '8,2% TTC'],
                            ['prix' => '120 000 € à 139 999 €', 'taux' => '7,5% TTC'],
                            ['prix' => '140 000 € à 319 999 €', 'taux' => '7% TTC'],
                            ['prix' => '320 000 € à 699 999 €', 'taux' => '6% TTC'],
                            ['prix' => '700 000 € à 1 199 999 €', 'taux' => '5,5% TTC'],
                            ['prix' => 'À partir de 1 200 000 €', 'taux' => '5% TTC'],
                        ];
                    @endphp
                    @foreach($honoraires as $h)
                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                        <span class="text-gray-700 text-sm font-medium">{{ $h['prix'] }}</span>
                        <span class="text-brand-blue font-bold text-sm">{{ $h['taux'] }}</span>
                    </div>
                    @endforeach
                </div>

                {{-- Version desktop : tableau --}}
                <div class="hidden md:block overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th class="px-6 py-4 text-left font-bold text-gray-700">Prix de vente net vendeur</th>
                                <th class="px-6 py-4 text-left font-bold text-brand-blue">Honoraires max.</th>
                                <th class="px-6 py-4 text-left font-bold text-gray-700">Prix de vente net vendeur</th>
                                <th class="px-6 py-4 text-left font-bold text-brand-blue">Honoraires max.</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-gray-700 font-medium">Jusqu'à 19 999 €</td>
                                <td class="px-6 py-4 text-brand-blue font-bold">10 000 € TTC</td>
                                <td class="px-6 py-4 text-gray-700 font-medium">100 000 € à 119 999 €</td>
                                <td class="px-6 py-4 text-brand-blue font-bold">8,2% TTC</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-gray-700 font-medium">20 000 € à 39 999 €</td>
                                <td class="px-6 py-4 text-brand-blue font-bold">25% TTC</td>
                                <td class="px-6 py-4 text-gray-700 font-medium">120 000 € à 139 999 €</td>
                                <td class="px-6 py-4 text-brand-blue font-bold">7,5% TTC</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-gray-700 font-medium">40 000 € à 59 999 €</td>
                                <td class="px-6 py-4 text-brand-blue font-bold">17% TTC</td>
                                <td class="px-6 py-4 text-gray-700 font-medium">140 000 € à 319 999 €</td>
                                <td class="px-6 py-4 text-brand-blue font-bold">7% TTC</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-gray-700 font-medium">60 000 € à 79 999 €</td>
                                <td class="px-6 py-4 text-brand-blue font-bold">12,5% TTC</td>
                                <td class="px-6 py-4 text-gray-700 font-medium">320 000 € à 699 999 €</td>
                                <td class="px-6 py-4 text-brand-blue font-bold">6% TTC</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-gray-700 font-medium">80 000 € à 99 999 €</td>
                                <td class="px-6 py-4 text-brand-blue font-bold">10% TTC</td>
                                <td class="px-6 py-4 text-gray-700 font-medium">700 000 € à 1 199 999 €</td>
                                <td class="px-6 py-4 text-brand-blue font-bold">5,5% TTC</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-gray-700 font-medium"></td>
                                <td class="px-6 py-4 text-brand-blue font-bold"></td>
                                <td class="px-6 py-4 text-gray-700 font-medium">À partir de 1 200 000 €</td>
                                <td class="px-6 py-4 text-brand-blue font-bold">5% TTC</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- NOTES IMPORTANTES --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 sm:p-8 mb-6 sm:mb-8">
                <h3 class="font-heading font-bold text-base sm:text-lg text-gray-900 mb-4 sm:mb-6 flex items-center justify-center sm:justify-start gap-2">
                    <i class="fas fa-file-alt text-brand-blue"></i>
                    Notes importantes
                </h3>
                <ul class="space-y-3">
                    <li class="flex items-start gap-2 sm:gap-3">
                        <i class="fas fa-check-circle text-brand-blue mt-0.5 flex-shrink-0 text-sm"></i>
                        <span class="text-gray-600 text-sm sm:text-base">Honoraires exprimés TTC, TVA incluse au taux légal en vigueur.</span>
                    </li>
                    <li class="flex items-start gap-2 sm:gap-3">
                        <i class="fas fa-check-circle text-brand-blue mt-0.5 flex-shrink-0 text-sm"></i>
                        <span class="text-gray-600 text-sm sm:text-base">Honoraires à la charge du vendeur, sauf stipulation contraire.</span>
                    </li>
                    <li class="flex items-start gap-2 sm:gap-3">
                        <i class="fas fa-check-circle text-brand-blue mt-0.5 flex-shrink-0 text-sm"></i>
                        <span class="text-gray-600 text-sm sm:text-base">Le présent barème s'applique au prix net vendeur indiqué au mandat.</span>
                    </li>
                    <li class="flex items-start gap-2 sm:gap-3">
                        <i class="fas fa-check-circle text-brand-blue mt-0.5 flex-shrink-0 text-sm"></i>
                        <span class="text-gray-600 text-sm sm:text-base">Les montants indiqués constituent des plafonds.</span>
                    </li>
                    <li class="flex items-start gap-2 sm:gap-3">
                        <i class="fas fa-check-circle text-brand-blue mt-0.5 flex-shrink-0 text-sm"></i>
                        <span class="text-gray-600 text-sm sm:text-base">Le barème complet est consultable sur simple demande ou sur le site internet du réseau.</span>
                    </li>
                </ul>
                <div class="mt-4 sm:mt-6 pt-4 sm:pt-6 border-t border-gray-100">
                    <p class="text-xs sm:text-sm text-gray-500 font-medium text-center sm:text-left">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        Document applicable à compter du 09/09/25
                    </p>
                </div>
            </div>

            {{-- CONDITIONS GÉNÉRALES --}}
            <div class="bg-amber-50 rounded-2xl border border-amber-200 p-5 sm:p-8">
                <h3 class="font-heading font-bold text-base sm:text-lg text-gray-900 mb-3 sm:mb-4 flex items-center justify-center sm:justify-start gap-2">
                    <i class="fas fa-balance-scale text-amber-600"></i>
                    Conditions générales
                </h3>
                <div class="space-y-3 sm:space-y-4 text-xs sm:text-sm text-gray-700 leading-relaxed">
                    <p>
                        <strong>1.</strong> L'agent commercial mandataire GEST'IMMO France n'est pas habilité à rédiger un avant contrat, ou un compromis de vente. De tels documents engageant les parties peuvent être rédigés par un notaire.
                    </p>
                    <p>
                        <strong>2.</strong> Nos honoraires sont exprimés en euros TTC (TVA au taux en vigueur) et sont dus : pour une vente immobilière, à la conclusion de l'acte authentique de vente chez le notaire.
                    </p>
                    <p>
                        <strong>3.</strong> Nos honoraires sont directement payés à GEST'IMMO France par le vendeur, l'acquéreur tels que prévus au contrat de mandat ou sur l'avant contrat contre remise d'une facture d'honoraires dûment libellée au nom du débiteur des honoraires.
                    </p>
                </div>
            </div>

            {{-- CTA --}}
            <div class="mt-8 sm:mt-12 text-center">
                <p class="text-gray-600 mb-4 sm:mb-6 text-sm sm:text-base">Une question sur nos honoraires ? Contactez-nous pour plus d'informations.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}" class="bg-brand-blue text-white px-8 py-3 rounded-lg font-bold hover:bg-blue-800 transition shadow-md inline-flex items-center justify-center gap-2">
                        <i class="fas fa-envelope"></i>
                        Nous contacter
                    </a>
                    <a href="{{ route('advisors') }}" class="bg-white text-brand-blue px-8 py-3 rounded-lg font-bold hover:bg-gray-50 transition shadow-md border border-gray-200 inline-flex items-center justify-center gap-2">
                        <i class="fas fa-user-tie"></i>
                        Trouver un conseiller
                    </a>
                </div>
            </div>

        </div>
    </div>

@endsection