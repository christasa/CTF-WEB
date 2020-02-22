import {Context, Hook, HttpResponseForbidden, HttpResponseRedirect, HttpResponseUnauthorized} from '@foal/core';

export function AdminRequired() {
    return Hook((ctx: Context) => {
        if (!ctx.session) {
            return new HttpResponseRedirect('/signin');
        }
        const isAdmin = ctx.session.get('isAdmin', false);
        if (!isAdmin) {
            return new HttpResponseForbidden('You are not admin.');
        }
    });
}
