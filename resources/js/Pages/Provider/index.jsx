import React from 'react'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link } from '@inertiajs/react';
import Table from '@/Components/Table';
import Tr from '@/Components/Tr';
import Th from '@/Components/Th';
import Td from '@/Components/Td';
import NavLink from '@/Components/NavLink';
import PrimaryButton from '@/Components/PrimaryButton';
import { PencilIcon, PlusIcon, TrashIcon } from '@heroicons/react/24/solid'
import Paginate from '@/Components/Paginate';

export default function Index(props) {
    console.log(props);
    //make table with tailwind in this page
    return (
        <AuthenticatedLayout
            user={props.auth.user}
            session={props.session}
            header={<h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Provider</h2>}
        >
            <Head title="Provider" />

            <div className='flex justify-center md:justify-end p-10'>
                <Link href={route('provider.create')}><PrimaryButton><PlusIcon className='w-5 mr-3' /> Tambah</PrimaryButton></Link>
            </div>

            <div className='overflow-x-auto p-5 md:p-10'>
                <Table>
                    <thead>
                        <Tr>
                            <Th>No.</Th>
                            <Th>Nama</Th>
                            <Th>Alamat</Th>
                            <Th>Kategori</Th>
                            <Th>Aksi</Th>
                        </Tr>
                    </thead>
                    <tbody>
                        {props.providers.data.map((provider, index) => (
                            <Tr key={index}>
                                <Td>{props.providers.from + index}</Td>
                                <Td>{provider.name}</Td>
                                <Td>{provider.address}</Td>
                                <Td>{provider.category.name}</Td>
                                <Td>
                                    <NavLink><PencilIcon className='w-5' /></NavLink>
                                    <NavLink><TrashIcon className='w-5 text-red-400' /></NavLink>
                                </Td>
                            </Tr>
                        ))}
                    </tbody>
                </Table>
                <Paginate className={'mt-5'} data={props.providers} />

            </div>
        </AuthenticatedLayout>
    )
}
