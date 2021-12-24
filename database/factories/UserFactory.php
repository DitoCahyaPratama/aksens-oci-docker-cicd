<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $username = $this->faker->name;
        $dataRole = ['guru', 'siswa'];
        $photo = ['foto_profil1.png', 'foto_profil2.png', 'foto_profil3.png'];
        $jk = ['laki-laki', 'perempuan'];
        $kelas = ['10', '11', '12'];
        $nik = rand(1,100000000000);
        $role = Arr::random($dataRole);
        return [
            'nik' => $role == 'guru' ? $nik : null,
            'nis' => $role == 'siswa' ? $nik : null,
            'kelas' => Arr::random($kelas),
            'name' => $this->faker->name(),
            'username' => $username,
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => \Carbon\Carbon::now(),
            'jenis_kelamin' => Arr::random($jk),
            'alamat' => $this->faker->city,
            'operational_time_start' => '08:00:00',
            'operational_time_end' => '17:00:00',
            'no_hp' => $this->faker->phoneNumber,
            'foto' => Arr::random($photo),
            'role' => $role,
            'status' => '1',
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
