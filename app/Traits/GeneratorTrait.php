<?php
namespace App\Traits;

use Illuminate\Support\Str;

trait GeneratorTrait
{
    use ScryptTrait;

    /** Generate a slug for PwTrack
     * @param string $password_for
     * @return string
     */
    public function generateSlug($password_for): string
    {
        return Str::slug($password_for);
    }

    /** Generate an base64 encode for slug and password
     * @param string $slug
     * @param string $password
     * @return string
     */
    public function base64_encode($slug, $password): string
    {
        $encoded = rtrim(strtr(base64_encode(`$slug:$password`), '+/', '-_'), '=');
        return $encoded;
    }

    /** Generate a decoded base64 for slug and password_for
     * @param string $encoded
     * @return array $decoded
     */
    public function base64_decode($encoded): array
    {
        $decoded = base64_decode(strtr($encoded, '-_', '+/'));

        $exp = explode(':', $decoded);

        return ['slug' => $exp[0], 'password' => $exp[1]];
    }

    /** Generate a hashed password
     * @param string $encoded
     * @return string
     */
    public function generateHashedPassword($encoded)
    {
        return $this->encrypt($encoded);
    }
}
