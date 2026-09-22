<?php

return [
    'paiement_confirme' => [
        'sujet' => 'Your payment has been received',
        'salutation' => 'Hello :nom,',
        'intro' => 'We confirm that your payment has been received and validated.',
        'rituel_en_cours' => 'Your ritual is now underway. We will get back to you soon to keep you informed of its progress.',
        'signature' => 'Thank you for your trust.',
        'montant' => 'Amount paid:',
    ],

    'proposition_rituel' => [
        'sujet' => 'Your personalised ritual and its cost',
        'salutation' => 'Hello :nom,',
        'intro' => 'Here are the details of the ritual prepared for you, along with what is needed to carry it out.',
        'description_titre' => 'Ritual description',
        'ingredients_titre' => 'Required items',
        'total' => 'Total amount due:',
        'paiement_titre' => 'How to pay',
        'paiement_intro' => 'Please make the payment using the details below, then send us your proof of payment by replying to this email.',
        'suivi_intro' => 'You can follow the progress of your case at any time via this link:',
        'signature' => 'Thank you for your trust.',
    ],

    'mise_a_jour' => [
        'sujet' => 'An update about your ritual',
        'salutation' => 'Hello :nom,',
        'suivi_intro' => 'You can follow the progress of your case at any time via this link:',
    ],

    'retrouver_suivi' => [
        'sujet' => 'Your tracking links',
        'salutation' => 'Hello :nom,',
        'intro' => 'Here are the link(s) to follow the progress of your case(s):',
        'aucun_dossier' => 'No case found for this address.',
    ],
];