import { AppNavbar } from '@/components/app/app-navbar';
import { Button } from '@/components/ui/button';
import AuthCardLayout from '@/layouts/auth/auth-card-layout';
import { type SharedData } from '@/types';
import { Head, Link, usePage } from '@inertiajs/react';

export default function Welcome() {
    const { auth } = usePage<SharedData>().props;

    return (
        <>
            <AuthCardLayout>
                <Head title="Hello" />
                <div className="max-w-2xl text-center">
                    <h1 className="text-4xl font-extrabold tracking-tight sm:text-5xl md:text-6xl">Hello there</h1>
                    <span className="mt-4 flex items-center justify-center">
                        <AppNavbar />
                    </span>
                    <p className="text-muted-foreground mt-6 text-lg leading-8">
                        Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut
                        repudiandae et a id nisi.
                    </p>
                    <div className="mt-10 flex justify-center">
                        <Button variant={'outline'} size="lg">
                            <Link href={route('register')}>Get Started</Link>
                        </Button>
                    </div>
                </div>
            </AuthCardLayout>
        </>
    );
}
