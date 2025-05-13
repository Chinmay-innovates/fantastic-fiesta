import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar';
import { Button } from '@/components/ui/button';
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import { SharedData } from '@/types';
import { Link, usePage } from '@inertiajs/react';
import { LogOutIcon, ShoppingCart, UserCog2Icon } from 'lucide-react';

export const AppNavbar = () => {
    const { auth } = usePage<SharedData>().props;
    const { user } = auth;
    return (
        <header className="dark:bg-accent flex items-center justify-between bg-white px-4 py-2">
            <Link href={'/'} className="text-xl font-semibold">
                LaraStore
            </Link>

            <div className="flex items-center space-x-4 p-2">
                {/* Cart Dropdown */}
                {user && (
                    <DropdownMenu>
                        <DropdownMenuTrigger asChild>
                            <Button variant="ghost" className="relative rounded-full p-2 hover:bg-amber-400/20">
                                <ShoppingCart className="size-5" />
                                <span className="absolute -top-1 -right-1 flex h-4 w-4 items-center justify-center rounded-full bg-red-500 text-xs text-white">
                                    8
                                </span>
                            </Button>
                        </DropdownMenuTrigger>
                        <DropdownMenuContent className="w-56">
                            <DropdownMenuLabel className="text-lg font-bold text-amber-500">8 Items</DropdownMenuLabel>
                            <DropdownMenuSeparator />
                            <div className="text-muted-foreground mb-2 px-2 text-sm">
                                Subtotal: <strong className="font-medium text-amber-400/90">$999</strong>
                            </div>
                            <Button variant="default" className="w-full">
                                View cart
                            </Button>
                        </DropdownMenuContent>
                    </DropdownMenu>
                )}

                {/* User Dropdown */}
                {user ? (
                    <DropdownMenu>
                        <DropdownMenuTrigger asChild>
                            <Avatar className="cursor-pointer">
                                <AvatarImage src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" alt="User" />
                                <AvatarFallback>U</AvatarFallback>
                            </Avatar>
                        </DropdownMenuTrigger>
                        <DropdownMenuContent className="w-52">
                            <DropdownMenuItem asChild className="justify-between">
                                <Link href={route('profile.edit')}>
                                    Profile
                                    <UserCog2Icon className="mr-2 size-5" />
                                </Link>
                            </DropdownMenuItem>
                            <DropdownMenuItem asChild>
                                <Link href={route('logout')} method="post" as="button" className="flex w-full items-center justify-between">
                                    Logout
                                    <LogOutIcon className="mr-2 size-5" />
                                </Link>
                            </DropdownMenuItem>
                        </DropdownMenuContent>
                    </DropdownMenu>
                ) : (
                    <>
                        <span className="text-sm hover:underline">
                            <Link href={route('login')} className="ml-4 p-4 text-sm">
                                Login
                            </Link>
                        </span>
                        <Button asChild>
                            <Link href={route('register')} className="ml-2 text-sm">
                                Register
                            </Link>
                        </Button>
                    </>
                )}
            </div>
        </header>
    );
};
