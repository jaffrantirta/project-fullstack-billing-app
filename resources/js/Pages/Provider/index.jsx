import React from 'react'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function index(props) {
    console.log(props);
    //make table with tailwind in this page
    return (
        <AuthenticatedLayout
            user={props.auth.user}
            session={props.session}
            header={<h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Provider</h2>}
        >
            <Head title="Provider" />

            <div>
                <table className="table-auto">
                    <thead>
                        <tr>
                            <th className="px-4 py-2">Name</th>
                            <th className="px-4 py-2">Email</th>
                            <th className="px-4 py-2">Phone</th>
                            <th className="px-4 py-2">Address</th>
                            <th className="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {props.providers.data.map((provider) => (
                            <tr key={provider.id}>
                                <td className="border px-4 py-2">{provider.name}</td>
                                <td className="border px-4 py-2">{provider.email}</td>
                                <td className="border px-4 py-2">{provider.phone}</td>
                                <td className="border px-4 py-2">{provider.address}</td>
                                <td className="border px-4 py-2">
                                    <a href={`/provider/${provider.id}/edit`} className="text-blue-500">Edit</a>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>

            </div>
        </AuthenticatedLayout>
    )
}
