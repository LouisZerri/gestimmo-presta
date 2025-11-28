<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstimationRequest extends FormRequest
{
    /**
     * Autorise toujours la requête (aucune logique d'autorisation spécifique ici).
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Définit les règles de validation du formulaire d'estimation.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            // Informations personnelles
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            
            // Informations du bien
            'adresse_bien' => 'required|string|max:500',
            'code_postal' => 'required|string|max:10',
            'ville' => 'required|string|max:255',
            'type_bien' => 'required|string|in:appartement,maison,immeuble,terrain,local_commercial,parking',
            
            // Caractéristiques
            'surface' => 'required|numeric|min:1|max:10000',
            'nb_pieces' => 'required|integer|min:1|max:50',
            'nb_chambres' => 'nullable|integer|min:0|max:30',
            'etage' => 'nullable|integer|min:0|max:100',
            'nb_etages_immeuble' => 'nullable|integer|min:1|max:100',
            'annee_construction' => 'nullable|integer|min:1800|max:' . date('Y'),
            
            // État et équipements
            'etat_general' => 'required|string|in:neuf,tres_bon,bon,a_rafraichir,a_renover',
            'dpe' => 'nullable|string|in:A,B,C,D,E,F,G,vierge,non_communique',
            'cave' => 'nullable|boolean',
            'parking' => 'nullable|boolean',
            'balcon_terrasse' => 'nullable|boolean',
            'jardin' => 'nullable|boolean',
            'ascenseur' => 'nullable|boolean',
            'gardien' => 'nullable|boolean',
            
            // Situation
            'situation' => 'required|string|in:proprietaire_occupant,proprietaire_bailleur,heritier,autre',
            'projet_vente' => 'required|string|in:moins_3_mois,3_6_mois,6_12_mois,plus_12_mois,simple_estimation',
            
            // Commentaires
            'commentaires' => 'nullable|string|max:2000',
        ];
    }

    /**
     * Définit les messages d'erreur personnalisés pour la validation du formulaire.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            // Informations personnelles
            'nom.required' => 'Veuillez saisir votre nom.',
            'prenom.required' => 'Veuillez saisir votre prénom.',
            'email.required' => 'Veuillez saisir votre adresse email.',
            'email.email' => 'Veuillez saisir une adresse email valide.',
            'telephone.required' => 'Veuillez saisir votre numéro de téléphone.',
            
            // Informations du bien
            'adresse_bien.required' => 'Veuillez saisir l\'adresse du bien.',
            'code_postal.required' => 'Veuillez saisir le code postal.',
            'ville.required' => 'Veuillez saisir la ville.',
            'type_bien.required' => 'Veuillez sélectionner le type de bien.',
            'type_bien.in' => 'Le type de bien sélectionné n\'est pas valide.',
            
            // Caractéristiques
            'surface.required' => 'Veuillez saisir la surface du bien.',
            'surface.numeric' => 'La surface doit être un nombre.',
            'surface.min' => 'La surface doit être supérieure à 0.',
            'nb_pieces.required' => 'Veuillez saisir le nombre de pièces.',
            'nb_pieces.integer' => 'Le nombre de pièces doit être un nombre entier.',
            'annee_construction.min' => 'L\'année de construction n\'est pas valide.',
            'annee_construction.max' => 'L\'année de construction ne peut pas être dans le futur.',
            
            // État
            'etat_general.required' => 'Veuillez sélectionner l\'état général du bien.',
            'etat_general.in' => 'L\'état sélectionné n\'est pas valide.',
            
            // Situation
            'situation.required' => 'Veuillez indiquer votre situation.',
            'projet_vente.required' => 'Veuillez indiquer votre horizon de vente.',
            
            // Commentaires
            'commentaires.max' => 'Les commentaires ne doivent pas dépasser 2000 caractères.',
        ];
    }

    /**
     * Prépare les données pour la validation. Notamment convertir les checkboxes en booléens.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        // Convertir les checkboxes en boolean
        $this->merge([
            'cave' => $this->has('cave'),
            'parking' => $this->has('parking'),
            'balcon_terrasse' => $this->has('balcon_terrasse'),
            'jardin' => $this->has('jardin'),
            'ascenseur' => $this->has('ascenseur'),
            'gardien' => $this->has('gardien'),
        ]);
    }
}