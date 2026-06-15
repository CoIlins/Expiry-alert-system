<?php

namespace App\Policies;

use App\Models\User;
use App\Models\VendorSupplier;
use Illuminate\Auth\Access\Response;

class VendorSupplierPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, VendorSupplier $vendorSupplier): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, VendorSupplier $vendorSupplier): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, VendorSupplier $vendorSupplier): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, VendorSupplier $vendorSupplier): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, VendorSupplier $vendorSupplier): bool
    {
        return false;
    }
}
