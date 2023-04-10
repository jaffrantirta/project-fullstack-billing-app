import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout'
import { Head } from '@inertiajs/react'
import React from 'react'
import FormProvider from './Partials/FormProvider'

export default function CreateOrUpdate(props) {
    return (
        <AuthenticatedLayout
            user={props.auth.user}
            session={props.session}
            header={<h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{props.isUpdate ? `Edit Provider` : `Buat Provider`}</h2>}
        >
            <Head title='Buat Provider' />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div className="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <FormProvider {...props} />
                    </div>
                </div>
            </div>

        </AuthenticatedLayout>
    )
}
