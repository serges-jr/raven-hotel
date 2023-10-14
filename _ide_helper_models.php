<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Admin
 *
 * @property int $id
 * @property string $speudo
 * @property mixed $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereSpeudo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperAdmin {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property string|null $detail
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperCategory {}
}

namespace App\Models{
/**
 * App\Models\Chambre
 *
 * @property int $id
 * @property string|null $image
 * @property int $surface
 * @property int $capacite
 * @property int $adulte
 * @property int $enfant
 * @property int $prix
 * @property string $description
 * @property int $status
 * @property int|null $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $feature
 * @property string|null $equipments
 * @property string $numero
 * @property-read \App\Models\Category|null $category
 * @method static \Illuminate\Database\Eloquent\Builder|Chambre newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chambre newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chambre query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chambre whereAdulte($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chambre whereCapacite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chambre whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chambre whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chambre whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chambre whereEnfant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chambre whereEquipments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chambre whereFeature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chambre whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chambre whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chambre whereNumero($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chambre wherePrix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chambre whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chambre whereSurface($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chambre whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperChambre {}
}

namespace App\Models{
/**
 * App\Models\Comment
 *
 * @property int $id
 * @property string $content
 * @property int $status
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUserId($value)
 * @mixin \Eloquent
 */
	class IdeHelperComment {}
}

namespace App\Models{
/**
 * App\Models\Equipment
 *
 * @property int $id
 * @property string $icon
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $status
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperEquipment {}
}

namespace App\Models{
/**
 * App\Models\Feature
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Chambre> $chambre
 * @property-read int|null $chambre_count
 * @method static \Illuminate\Database\Eloquent\Builder|Feature newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Feature newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Feature query()
 * @method static \Illuminate\Database\Eloquent\Builder|Feature whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feature whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feature whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feature whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feature whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperFeature {}
}

namespace App\Models{
/**
 * App\Models\Menage
 *
 * @property int $id
 * @property int $reservation_id
 * @property int $etat
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $menage
 * @property-read \App\Models\Reservation $reservation
 * @method static \Illuminate\Database\Eloquent\Builder|Menage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menage query()
 * @method static \Illuminate\Database\Eloquent\Builder|Menage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menage whereEtat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menage whereMenage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menage whereReservationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menage whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperMenage {}
}

namespace App\Models{
/**
 * App\Models\Notification
 *
 * @property int $id
 * @property string $libelle
 * @property string $description
 * @property int $reservation_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereLibelle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereReservationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperNotification {}
}

namespace App\Models{
/**
 * App\Models\Requete
 *
 * @property int $id
 * @property int $user_id
 * @property string $sujet
 * @property string $message
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Requete newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Requete newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Requete query()
 * @method static \Illuminate\Database\Eloquent\Builder|Requete whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requete whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requete whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requete whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requete whereSujet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requete whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requete whereUserId($value)
 * @mixin \Eloquent
 */
	class IdeHelperRequete {}
}

namespace App\Models{
/**
 * App\Models\Reservation
 *
 * @property int $id
 * @property string|null $dateDebut
 * @property string|null $dateFin
 * @property int $user_id
 * @property int $chambre_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $message
 * @property int $status
 * @property int|null $montant
 * @property int|null $nbjour
 * @property-read \App\Models\Chambre|null $chambre
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Menage> $menage
 * @property-read int|null $menage_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereChambreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereDateDebut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereDateFin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereMontant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereNbjour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereUserId($value)
 * @mixin \Eloquent
 */
	class IdeHelperReservation {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $lastname
 * @property string $adresse
 * @property int $phone
 * @property int $sexe
 * @property string $date
 * @property string|null $avatar
 * @property string|null $fonction
 * @property int|null $salaire
 * @property string|null $dateEmbauche
 * @property string $role
 * @property int $status
 * @property int $online
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Comment> $comment
 * @property-read int|null $comment_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAdresse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDateEmbauche($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFonction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereOnline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSalaire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSexe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperUser {}
}

