import React, { useState } from 'react'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link, useForm } from '@inertiajs/react';
import Table from '@/Components/Table';
import Tr from '@/Components/Tr';
import Th from '@/Components/Th';
import Td from '@/Components/Td';
import PrimaryButton from '@/Components/PrimaryButton';
import { MagnifyingGlassIcon, PencilIcon, PlusIcon, TrashIcon } from '@heroicons/react/24/solid'
import Paginate from '@/Components/Paginate';
import Modal from '@/Components/Modal';
import SecondaryButton from '@/Components/SecondaryButton';
import DangerButton from '@/Components/DangerButton';
import TextInput from '@/Components/TextInput';

export default function Index(props) {
    const [confirmingDeletion, setConfirmingDeletion] = useState(false);
    const { data, setData, get, delete: destroy, processing, reset, hasErrors } = useForm({
        id: '',
        search: '',
    });

    const closeModal = () => {
        setConfirmingDeletion(false);
        reset();
    };

    const deleteProcess = (e) => {
        e.preventDefault();

        destroy(route('provider.destroy', data.id), {
            preserveScroll: true,
            onSuccess: () => closeModal(),
            onFinish: () => reset(),
        });
    };

    const onSearch = (e) => {
        e.preventDefault();

        const search = data.search.trim();

        if (search) {
            get(route('provider.index', { q: search }), {
                preserveScroll: true,
                onSuccess: (data) => {
                    setData(data);
                },
            });
        } else {
            get(route('provider.index'), {
                preserveScroll: true,
                onSuccess: (data) => {
                    setData(data);
                },
            });
        }
    }
    return (
        <AuthenticatedLayout
            user={props.auth.user}
            session={props.session}
            header={<h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Provider</h2>}
        >
            <Head title="Provider" />

            <div className='grid grid-cols-1 md:grid-cols-2 gap-5 p-10'>
                <form onSubmit={onSearch} className="flex gap-3">
                    <TextInput id="search" type="search" placeholder="Pencarian..." onChange={(e) => setData('search', e.target.value)} />
                    <PrimaryButton><MagnifyingGlassIcon className='h-5 mr-2' />Cari</PrimaryButton>
                </form>
                <div className='flex justify-center md:justify-end'>
                    <Link href={route('provider.create')}><PrimaryButton><PlusIcon className='w-5 mr-3' /> Tambah</PrimaryButton></Link>
                </div>
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
                        {props.providers.data.length > 0 ? props.providers.data.map((provider, index) => (
                            <Tr key={index}>
                                <Td>{props.providers.from + index}</Td>
                                <Td>{provider.name}</Td>
                                <Td>{provider.address}</Td>
                                <Td>{provider.category.name}</Td>
                                <Td className={'flex gap-3'}>
                                    <Link className='p-3 rounded-full hover:bg-primary transition-all duration-500' href={route('provider.edit', provider.id)}><PencilIcon className='w-5' /></Link>
                                    <Link className='p-3 rounded-full hover:bg-primary transition-all duration-500' onClick={(e) => {
                                        e.preventDefault();
                                        setData('id', provider.id);
                                        setConfirmingDeletion(true);
                                    }}><TrashIcon className='w-5 text-red-400' /></Link>
                                </Td>
                            </Tr>
                        )) : (
                            <Tr>
                                <Td colSpan={5} className={'text-center'}>Tidak ada data</Td>
                            </Tr>
                        )}
                    </tbody>
                </Table>
                <Paginate className={'mt-5'} data={props.providers} />
            </div>
            <Modal show={confirmingDeletion} onClose={closeModal}>
                <form onSubmit={deleteProcess} className="p-6">
                    <h2 className="text-lg font-medium text-gray-900 dark:text-slate-200">
                        Yakin hapus?
                    </h2>

                    <p className="mt-1 text-sm text-gray-600 dark:text-slate-200">
                        Ketika dihapus, semua data provider ini akan dihapus secara permanen.
                    </p>

                    {hasErrors && <InputError message={'Oops! Sepertinya ada kesalahan'} />}


                    <div className="mt-6 flex justify-end">
                        <SecondaryButton onClick={closeModal}>Batal</SecondaryButton>

                        <DangerButton className="ml-3" disabled={processing}>
                            Ya, Hapus!
                        </DangerButton>
                    </div>
                </form>
            </Modal>
        </AuthenticatedLayout>
    )
}
