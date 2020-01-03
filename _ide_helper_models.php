<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\TrainingProgram
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TrainingProgram newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TrainingProgram newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TrainingProgram query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TrainingProgram whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TrainingProgram whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TrainingProgram whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TrainingProgram whereUpdatedAt($value)
 */
	class TrainingProgram extends \Eloquent {}
}

namespace App{
/**
 * App\ForRepsTest
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ForRepsTest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ForRepsTest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ForRepsTest query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ForRepsTest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ForRepsTest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ForRepsTest whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ForRepsTest whereUpdatedAt($value)
 */
	class ForRepsTest extends \Eloquent {}
}

namespace App{
/**
 * App\StrengthTest
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StrengthTest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StrengthTest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StrengthTest query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StrengthTest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StrengthTest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StrengthTest whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StrengthTest whereUpdatedAt($value)
 */
	class StrengthTest extends \Eloquent {}
}

namespace App{
/**
 * App\Role
 *
 * @property int $id
 * @property string $name
 * @property string|null $display_name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App{
/**
 * App\TrainingTask
 *
 * @property int $id
 * @property string $header
 * @property string $content
 * @property string|null $results
 * @property int|null $training_programs_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TrainingTask newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TrainingTask newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TrainingTask query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TrainingTask whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TrainingTask whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TrainingTask whereHeader($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TrainingTask whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TrainingTask whereResults($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TrainingTask whereTrainingProgramsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TrainingTask whereUpdatedAt($value)
 */
	class TrainingTask extends \Eloquent {}
}

namespace App{
/**
 * App\ForTimeTest
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ForTimeTest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ForTimeTest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ForTimeTest query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ForTimeTest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ForTimeTest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ForTimeTest whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ForTimeTest whereUpdatedAt($value)
 */
	class ForTimeTest extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $password
 * @property string|null $first_name
 * @property string|null $last_name
 * @property int|null $training_programs_id
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User orWherePermissionIs($permission = '')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User orWhereRoleIs($role = '', $team = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePermissionIs($permission = '', $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRoleIs($role = '', $team = null, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereTrainingProgramsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Permission
 *
 * @property int $id
 * @property string $name
 * @property string|null $display_name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereUpdatedAt($value)
 */
	class Permission extends \Eloquent {}
}

