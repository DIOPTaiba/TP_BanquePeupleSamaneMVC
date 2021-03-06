<?php
/* Smarty version 3.1.30, created on 2020-08-10 15:56:02
  from "/opt/lampp/htdocs/mesprojets/banquepeuplesamanemvc/src/view/clientNonSalarie/compteClientNonSalarie.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f3151f2007026_17234760',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '336ffd6e43fd7064441f5e876fd1e92a05a2c488' => 
    array (
      0 => '/opt/lampp/htdocs/mesprojets/banquepeuplesamanemvc/src/view/clientNonSalarie/compteClientNonSalarie.html',
      1 => 1597067697,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f3151f2007026_17234760 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Ouverture Compte Bancaire</title>
    <meta charset="utf-8" />
    <!-- <link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/css/bootstrap.min.css" /> -->
    <link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/css/script_index.css" />
</head>

<body>
    <header>
        <h1>BIENVENUE DANS LA BANQUE DU PEUPLE</h1>
    </header>

    <div class="choix_client">

        <p>Cliquez sur Nouveau client pour enregistrer un compte pour un nouveau client</p>
        <p>Cliquez sur Client existant pour enregistrer un compte pour un client qui existe déjà</p>
        <div id="select_client">
            <button id="nouveau_client" name="nouveau_client" onclick="affiche_nouveau_client()">Nouveau Client</button>
            <!--<label for="nouveau_client"></label><br>-->
            <button id="client_existant" name="client_existant" onclick="affiche_client_existant()">Client Existant</button>
            <!--<label for="client_existant"></label><br>-->
        </div>
        <form id="saisie_id_client" action="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
RechercheClientNonSalarie/rechercheClient" method="POST">
            <input type="search" id="identifiant_client" name="identifiant_client" placeholder="identifiant client" />
            <input type="submit" name="search" id="search" value="Search" />
        </form>
    </div>

    <?php if (isset($_smarty_tpl->tpl_vars['clientIntrouvable']->value)) {?>
    <div class="alert alert-danger" style="width: 30%; margin: auto; text-align: center;">
        <?php echo $_smarty_tpl->tpl_vars['clientIntrouvable']->value;?>

    </div>
    <?php }?>

    <form id="form_compte_non_salarie" action="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
ClientNonSalarie/insertClientNonSalarie" method="post" onsubmit="return verifie_formulaire_non_salarie(this)">

        <h2>VEILLEZ SAISIR LES INFORMATIONS DU CLIENT</h2>
        <p><i>Les champs marqué par </i><em>*</em> sont <em>obligatoires</em></p>
        <fieldset>
            <legend>Informations du Client</legend>
            <div>
                <label for="nom">Nom <em>*</em></label>
                <input type="text" id="nom" name="nom" placeholder="ex : DIOP" onblur="verifie_nom(this)" />
            </div>
            <div>
                <label for="prenom">Prénom <em>*</em></label>
                <input type="text" id="prenom" name="prenom" placeholder="ex : Mor" onblur="verifie_prenom(this)" />
            </div>
            <div>
                <label for="adresse">Adresse <em>*</em></label>
                <input type="text" id="adresse" name="adresse" placeholder="ex : Grand Yoff" onblur="verifie_adresse(this)" />
            </div>
            <div>
                <label for="telephone">Tel <em>*</em></label>
                <input type="tel" id="telephone" name="telephone" placeholder="ex : +2217xxxxxxxx " onblur="verifie_telephone(this)" />
            </div>
            <div>
                <label for="email">E-mail </label>
                <input type="text" id="email" name="email" placeholder="ex : prenom.nom@simplon.co" onblur="verifie_email(this)" />
            </div>
            <div>
                <label for="carte_identite">CNI </label>
                <input type="text" id="carte_identite" name="carte_identite" placeholder="1234567891234" />
            </div>
            <div>
                <label for="type_client">Type client </label>
                <input type="text" id="type_client" name="type_client" value="Non Salarie" readonly />
            </div>
            <div>
                <label for="id_responsable_compte">Id responsable compte </label>
                <input type="text" id="id_responsable_compte" name="id_responsable_compte" value="1" readonly />
            </div>

        </fieldset>

        <fieldset>
            <legend>Informations Compte</legend>
            <label class="selection_type_compte">Sélectionnez le type de compte <em>*</em></label>
            <select id="type_compte" name="type_compte">
					<option value="non selection">Type de compte</option>
					<option value="compte epargne">Compte Epargne</option>
					<option id="compte_bloque" value="compte bloque" onselect="verification_duree_blocage(this)">Compte Bloqué</option>
					</select>
            <span id="erreur_selection"></span>
            <br/><br/>

            <div>
                <label for="numero_agence">N° de l'agence <em></em></label>
                <input type="text" id="numero_agence" name="numero_agence" placeholder="saisir le N° de l'agence" />
            </div>
            <div>
                <label for="numero_compte">N° Compte <em></em></label>
                <input type="text" id="numero_compte" name="numero_compte" placeholder="saisir le N° de Compte" />
            </div>
            <div>
                <label for="cle_rib">Clé RIB <em></em></label>
                <input type="text" id="cle_rib" name="cle_rib" placeholder="saisir la clé RIB" />
            </div>
            <div>
                <label for="solde">Solde (optionnel)<em></em></label>
                <input type="text" id="solde" name="solde" />
            </div>

            <div id="frais_ouverture_compte">
                <label for="frais_ouverture">Frais ouverture <em></em></label>
                <input type="text" id="frais_ouverture" name="frais_ouverture" value="10000" />
            </div>
            <div id="montant_remuneration_compte">
                <label for="montant_remuneration">Montant Rémuneration <em></em></label>
                <input type="text" id="montant_remuneration" name="montant_remuneration" />
            </div>
            <div id="agios_compte">
                <label for="agios">Agios <em></em></label>
                <input type="text" id="agios" name="agios" placeholder="saisir l'agios" />
            </div>
            <div id="duree_blocage_compte">
                <label for="duree_blocage">Durée Blocage <em></em></label>
                <input type="text" name="duree_blocage" id="duree_blocage" /><span id="mois"> mois </span><span id="erreur_duree"></span>
            </div>
        </fieldset>

        <div class="validation">
            <input type="submit" value="Valider" id="valider" />
            <input type="reset" value="Annuler" />
        </div>

    </form>

    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/js/script_index.js"><?php echo '</script'; ?>
>
</body>

</html><?php }
}
