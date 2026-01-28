@extends('layouts.app')

@section('title', "Politique de Confidentialité - GEST'IMMO")

@section('content')

<div class="bg-brand-light py-10 sm:py-12 md:py-16">
    <div class="max-w-4xl mx-auto px-4">
        <h1 class="font-heading font-bold text-2xl sm:text-3xl md:text-4xl text-gray-900 mb-6 sm:mb-8">Politique de Confidentialité</h1>

        <div class="bg-white rounded-2xl shadow-sm p-5 sm:p-8 md:p-12">
            <div class="prose prose-sm sm:prose-base md:prose-lg max-w-none break-words">

                {{-- Introduction --}}
                <div class="bg-brand-blue/5 border border-brand-blue/10 rounded-xl p-4 sm:p-6 mb-6 sm:mb-8 not-prose">
                    <div class="flex flex-col sm:flex-row items-center sm:items-start gap-3 sm:gap-4 text-center sm:text-left">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-brand-blue rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user-shield text-white text-lg sm:text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-heading font-bold text-base sm:text-lg text-gray-800 mb-2">Votre vie privée compte</h3>
                            <p class="text-gray-600 text-xs sm:text-sm">
                                Chez GEST'IMMO, nous nous engageons à protéger vos données personnelles.
                                Cette politique explique comment nous collectons, utilisons et protégeons vos informations.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- 1. Responsable du traitement --}}
                <h3>1. Responsable du traitement</h3>
                <p>Le responsable du traitement des données personnelles est :</p>
                <div class="bg-gray-50 rounded-xl p-4 sm:p-6 my-4 sm:my-6 not-prose">
                    <div class="font-heading font-bold text-brand-blue mb-3 text-sm sm:text-base">GEST'IMMO</div>
                    <ul class="space-y-2 text-gray-600 text-xs sm:text-sm">
                        <li class="flex items-start gap-2"><i class="fas fa-map-marker-alt text-gray-400 w-4 flex-shrink-0 mt-0.5"></i><span>35 rue Aliénor d'Aquitaine, 19360 Malemort</span></li>
                        <li class="flex items-start gap-2"><i class="fas fa-phone text-gray-400 w-4 flex-shrink-0 mt-0.5"></i><a href="tel:0613250596" class="text-brand-blue hover:underline">06 13 25 05 96</a></li>
                        <li class="flex items-start gap-2"><i class="fas fa-envelope text-gray-400 w-4 flex-shrink-0 mt-0.5"></i><a href="mailto:contact@gestimmo-presta.fr" class="text-brand-blue hover:underline break-all">contact@gestimmo-presta.fr</a></li>
                    </ul>
                </div>

                {{-- 2. Données collectées --}}
                <h3>2. Données personnelles collectées</h3>
                <p>Dans le cadre de notre activité, nous sommes amenés à collecter les données suivantes :</p>
                
                <div class="grid sm:grid-cols-2 gap-4 my-6 not-prose">
                    <div class="bg-gray-50 rounded-xl p-4 sm:p-5 border border-gray-100">
                        <div class="flex items-center gap-2 mb-3">
                            <i class="fas fa-user text-brand-blue"></i>
                            <span class="font-bold text-gray-800 text-sm sm:text-base">Données d'identification</span>
                        </div>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Nom et prénom</li>
                            <li>• Adresse postale</li>
                            <li>• Numéro de téléphone</li>
                            <li>• Adresse e-mail</li>
                        </ul>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4 sm:p-5 border border-gray-100">
                        <div class="flex items-center gap-2 mb-3">
                            <i class="fas fa-home text-brand-blue"></i>
                            <span class="font-bold text-gray-800 text-sm sm:text-base">Données immobilières</span>
                        </div>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Adresse du bien</li>
                            <li>• Caractéristiques du bien</li>
                            <li>• Projet immobilier</li>
                            <li>• Budget / Capacité financière</li>
                        </ul>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4 sm:p-5 border border-gray-100">
                        <div class="flex items-center gap-2 mb-3">
                            <i class="fas fa-globe text-brand-blue"></i>
                            <span class="font-bold text-gray-800 text-sm sm:text-base">Données de navigation</span>
                        </div>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Adresse IP</li>
                            <li>• Type de navigateur</li>
                            <li>• Pages consultées</li>
                            <li>• Date et heure de connexion</li>
                        </ul>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4 sm:p-5 border border-gray-100">
                        <div class="flex items-center gap-2 mb-3">
                            <i class="fas fa-comments text-brand-blue"></i>
                            <span class="font-bold text-gray-800 text-sm sm:text-base">Données de communication</span>
                        </div>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Messages via formulaires</li>
                            <li>• Historique des échanges</li>
                            <li>• Préférences de contact</li>
                            <li>• Consentements</li>
                        </ul>
                    </div>
                </div>

                {{-- 3. Finalités du traitement --}}
                <h3>3. Finalités du traitement</h3>
                <p>Vos données personnelles sont collectées et traitées pour les finalités suivantes :</p>
                <ul>
                    <li><strong>Gestion des demandes :</strong> traitement de vos demandes d'information, d'estimation ou de contact</li>
                    <li><strong>Relation client :</strong> suivi de votre projet immobilier et communication personnalisée</li>
                    <li><strong>Prospection commerciale :</strong> envoi d'offres et d'informations sur nos services (avec votre consentement)</li>
                    <li><strong>Amélioration des services :</strong> analyse statistique et amélioration de notre site web</li>
                    <li><strong>Obligations légales :</strong> respect de nos obligations réglementaires et fiscales</li>
                </ul>

                {{-- 4. Base légale --}}
                <h3>4. Base légale du traitement</h3>
                <p>Le traitement de vos données repose sur les bases légales suivantes :</p>
                
                {{-- Version mobile : liste --}}
                <div class="sm:hidden my-4 space-y-2 not-prose">
                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                        <span class="text-gray-600 text-xs">Réponse à vos demandes</span>
                        <span class="bg-blue-100 text-brand-blue px-2 py-1 rounded text-xs font-bold">Contractuelle</span>
                    </div>
                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                        <span class="text-gray-600 text-xs">Envoi de newsletters</span>
                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-bold">Consentement</span>
                    </div>
                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                        <span class="text-gray-600 text-xs">Analyse statistique</span>
                        <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs font-bold">Intérêt légitime</span>
                    </div>
                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                        <span class="text-gray-600 text-xs">Conservation documents</span>
                        <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs font-bold">Obligation légale</span>
                    </div>
                </div>
                {{-- Version desktop : tableau --}}
                <div class="hidden sm:block overflow-x-auto my-6">
                    <table class="w-full text-sm not-prose">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="text-left p-3 font-bold text-gray-800 rounded-tl-lg">Finalité</th>
                                <th class="text-left p-3 font-bold text-gray-800 rounded-tr-lg">Base légale</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr>
                                <td class="p-3 text-gray-600">Réponse à vos demandes</td>
                                <td class="p-3"><span class="bg-blue-100 text-brand-blue px-2 py-1 rounded text-xs font-bold">Exécution contractuelle</span></td>
                            </tr>
                            <tr>
                                <td class="p-3 text-gray-600">Envoi de newsletters</td>
                                <td class="p-3"><span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-bold">Consentement</span></td>
                            </tr>
                            <tr>
                                <td class="p-3 text-gray-600">Analyse statistique</td>
                                <td class="p-3"><span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs font-bold">Intérêt légitime</span></td>
                            </tr>
                            <tr>
                                <td class="p-3 text-gray-600">Conservation documents</td>
                                <td class="p-3"><span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs font-bold">Obligation légale</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- 5. Durée de conservation --}}
                <h3>5. Durée de conservation</h3>
                <p>Vos données personnelles sont conservées pendant une durée limitée :</p>
                
                <div class="bg-gray-50 rounded-xl p-4 sm:p-6 my-4 sm:my-6 not-prose">
                    <ul class="space-y-3 sm:space-y-4">
                        <li class="flex items-start gap-2 sm:gap-3">
                            <div class="w-7 h-7 sm:w-8 sm:h-8 bg-brand-blue/10 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fas fa-user text-brand-blue text-xs sm:text-sm"></i>
                            </div>
                            <div>
                                <span class="font-bold text-gray-800 text-sm sm:text-base">Données clients</span>
                                <p class="text-xs sm:text-sm text-gray-600">10 ans après le dernier contact</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-2 sm:gap-3">
                            <div class="w-7 h-7 sm:w-8 sm:h-8 bg-brand-blue/10 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fas fa-envelope text-brand-blue text-xs sm:text-sm"></i>
                            </div>
                            <div>
                                <span class="font-bold text-gray-800 text-sm sm:text-base">Prospects</span>
                                <p class="text-xs sm:text-sm text-gray-600">3 ans à compter de la collecte</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-2 sm:gap-3">
                            <div class="w-7 h-7 sm:w-8 sm:h-8 bg-brand-blue/10 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fas fa-chart-bar text-brand-blue text-xs sm:text-sm"></i>
                            </div>
                            <div>
                                <span class="font-bold text-gray-800 text-sm sm:text-base">Navigation</span>
                                <p class="text-xs sm:text-sm text-gray-600">13 mois maximum (cookies)</p>
                            </div>
                        </li>
                    </ul>
                </div>

                {{-- 6. Destinataires --}}
                <h3>6. Destinataires des données</h3>
                <p>Vos données personnelles peuvent être transmises aux destinataires suivants :</p>
                <ul>
                    <li><strong>Personnel habilité</strong> de GEST'IMMO (direction, conseillers, service client)</li>
                    <li><strong>Sous-traitants techniques</strong> : hébergeur (IONOS), outils de gestion, prestataires informatiques</li>
                    <li><strong>Partenaires</strong> : uniquement avec votre accord préalable (notaires, courtiers, etc.)</li>
                    <li><strong>Autorités</strong> : en cas d'obligation légale uniquement</li>
                </ul>
                <p>
                    <strong>Aucune donnée n'est vendue ou cédée à des tiers à des fins commerciales.</strong>
                </p>

                {{-- 7. Transferts hors UE --}}
                <h3>7. Transferts hors Union Européenne</h3>
                <p>
                    Vos données sont hébergées au sein de l'Union Européenne. 
                    En cas de transfert vers un pays tiers, nous nous assurons que des garanties appropriées sont mises en place 
                    (clauses contractuelles types, décision d'adéquation de la Commission européenne).
                </p>

                {{-- 8. Vos droits --}}
                <h3>8. Vos droits</h3>
                <p>
                    Conformément au Règlement Général sur la Protection des Données (RGPD) et à la loi Informatique et Libertés, 
                    vous disposez des droits suivants :
                </p>

                <div class="grid sm:grid-cols-2 gap-3 sm:gap-4 my-6 not-prose">
                    <div class="flex items-start gap-3 p-3 sm:p-4 bg-gray-50 rounded-lg">
                        <div class="w-7 h-7 sm:w-8 sm:h-8 bg-brand-blue rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-eye text-white text-xs sm:text-sm"></i>
                        </div>
                        <div>
                            <span class="font-bold text-gray-800 text-xs sm:text-sm">Droit d'accès</span>
                            <p class="text-xs text-gray-600 mt-1">Obtenir la confirmation que vos données sont traitées et en recevoir une copie</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-3 sm:p-4 bg-gray-50 rounded-lg">
                        <div class="w-7 h-7 sm:w-8 sm:h-8 bg-brand-blue rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-edit text-white text-xs sm:text-sm"></i>
                        </div>
                        <div>
                            <span class="font-bold text-gray-800 text-xs sm:text-sm">Droit de rectification</span>
                            <p class="text-xs text-gray-600 mt-1">Corriger des données inexactes ou compléter des données incomplètes</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-3 sm:p-4 bg-gray-50 rounded-lg">
                        <div class="w-7 h-7 sm:w-8 sm:h-8 bg-brand-blue rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-trash text-white text-xs sm:text-sm"></i>
                        </div>
                        <div>
                            <span class="font-bold text-gray-800 text-xs sm:text-sm">Droit à l'effacement</span>
                            <p class="text-xs text-gray-600 mt-1">Demander la suppression de vos données (droit à l'oubli)</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-3 sm:p-4 bg-gray-50 rounded-lg">
                        <div class="w-7 h-7 sm:w-8 sm:h-8 bg-brand-blue rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-pause text-white text-xs sm:text-sm"></i>
                        </div>
                        <div>
                            <span class="font-bold text-gray-800 text-xs sm:text-sm">Droit à la limitation</span>
                            <p class="text-xs text-gray-600 mt-1">Geler temporairement l'utilisation de certaines données</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-3 sm:p-4 bg-gray-50 rounded-lg">
                        <div class="w-7 h-7 sm:w-8 sm:h-8 bg-brand-blue rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-exchange-alt text-white text-xs sm:text-sm"></i>
                        </div>
                        <div>
                            <span class="font-bold text-gray-800 text-xs sm:text-sm">Droit à la portabilité</span>
                            <p class="text-xs text-gray-600 mt-1">Récupérer vos données dans un format structuré et lisible</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-3 sm:p-4 bg-gray-50 rounded-lg">
                        <div class="w-7 h-7 sm:w-8 sm:h-8 bg-brand-blue rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-ban text-white text-xs sm:text-sm"></i>
                        </div>
                        <div>
                            <span class="font-bold text-gray-800 text-xs sm:text-sm">Droit d'opposition</span>
                            <p class="text-xs text-gray-600 mt-1">Vous opposer au traitement de vos données pour motif légitime</p>
                        </div>
                    </div>
                </div>

                {{-- Comment exercer vos droits --}}
                <div class="bg-brand-blue text-white rounded-xl p-5 sm:p-6 my-6 sm:my-8 not-prose">
                    <h4 class="font-heading font-bold text-base sm:text-lg mb-3 sm:mb-4 flex items-center gap-2">
                        <i class="fas fa-paper-plane"></i> Comment exercer vos droits ?
                    </h4>
                    <p class="text-blue-100 mb-4">
                        Vous pouvez exercer vos droits à tout moment en nous contactant :
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="mailto:contact@gestimmo-presta.fr" class="inline-flex items-center justify-center gap-2 bg-white text-brand-blue font-bold px-5 py-3 rounded-lg hover:bg-gray-100 transition">
                            <i class="fas fa-envelope"></i> contact@gestimmo-presta.fr
                        </a>
                        <a href="tel:0613250596" class="inline-flex items-center justify-center gap-2 bg-white/20 text-white font-bold px-5 py-3 rounded-lg hover:bg-white/30 transition border border-white/30">
                            <i class="fas fa-phone"></i> 06 13 25 05 96
                        </a>
                    </div>
                    <p class="text-blue-200 text-sm mt-4">
                        Merci de joindre une copie de votre pièce d'identité pour toute demande d'exercice de droits.
                    </p>
                </div>

                {{-- 9. Réclamation --}}
                <h3>9. Réclamation auprès de la CNIL</h3>
                <p>
                    Si vous estimez que le traitement de vos données constitue une violation de vos droits,
                    vous pouvez introduire une réclamation auprès de la CNIL :
                </p>
                <div class="bg-gray-50 rounded-xl p-4 sm:p-6 my-4 sm:my-6 not-prose">
                    <div class="font-bold text-gray-800 mb-2 text-sm sm:text-base">CNIL</div>
                    <ul class="text-gray-600 text-xs sm:text-sm space-y-1">
                        <li>3 Place de Fontenoy, TSA 80715</li>
                        <li>75334 Paris Cedex 07</li>
                        <li class="pt-2">
                            <a href="https://www.cnil.fr" target="_blank" class="text-brand-blue hover:underline">
                                <i class="fas fa-external-link-alt mr-1"></i> www.cnil.fr
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- 10. Sécurité --}}
                <h3>10. Sécurité des données</h3>
                <p>
                    GEST'IMMO met en œuvre des mesures techniques et organisationnelles appropriées pour assurer 
                    la sécurité et la confidentialité de vos données personnelles :
                </p>
                <ul>
                    <li>Chiffrement des données sensibles (SSL/TLS)</li>
                    <li>Accès restreint aux données (authentification, droits d'accès)</li>
                    <li>Sauvegardes régulières</li>
                    <li>Mise à jour des systèmes de sécurité</li>
                    <li>Sensibilisation du personnel</li>
                </ul>

                {{-- 11. Cookies --}}
                <h3>11. Cookies</h3>
                <p>
                    Notre site utilise des cookies. Pour en savoir plus sur les cookies utilisés et gérer vos préférences, 
                    consultez notre <a href="{{ route('cookies') }}" class="text-brand-blue hover:underline">politique de cookies</a>.
                </p>

                {{-- 12. Modifications --}}
                <h3>12. Modifications de la politique</h3>
                <p>
                    GEST'IMMO se réserve le droit de modifier la présente politique de confidentialité à tout moment. 
                    En cas de modification substantielle, nous vous en informerons par e-mail ou via une notification sur notre site. 
                    Nous vous invitons à consulter régulièrement cette page.
                </p>

                {{-- Date de mise à jour --}}
                <div class="mt-12 pt-6 border-t border-gray-200">
                    <p class="text-sm text-gray-400">
                        <i class="far fa-calendar-alt mr-2"></i>Dernière mise à jour : {{ date('d/m/Y') }}
                    </p>
                </div>
            </div>
        </div>

        {{-- Bouton retour --}}
        <div class="mt-8 text-center">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-brand-blue font-bold hover:underline">
                <i class="fas fa-arrow-left"></i> Retour à l'accueil
            </a>
        </div>
    </div>
</div>

@endsection