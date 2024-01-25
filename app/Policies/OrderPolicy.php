<?php

namespace App\Policies;

use App\Models\Artwork;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderPolicy
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
    public function view(User $user, Order $order): bool
    {
        return $user->id === $order->user_id || $user->role_id > 2;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Request $request): bool
    {
        return !$user->author->exists() || $user->author->id !== Artwork::find($request->product_id)->author_id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Order $order): bool
    {
        return $order->user_id == $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Order $order): bool
    {
        return $order->user_id == $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Order $order): bool
    {
        return $order->user_id == $user->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Order $order): bool
    {
        return $order->user_id == $user->id || $user->role_id > 2;
    }
}
