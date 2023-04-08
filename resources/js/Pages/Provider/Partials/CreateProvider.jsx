import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Link, useForm, usePage } from '@inertiajs/react';
import { Transition } from '@headlessui/react';
import Select from '@/Components/Select';

export default function CreateProvider({ className = '', categories }) {
    const { data, setData, post, errors, reset, processing, recentlySuccessful } = useForm({
        name: '',
        address: '',
        email: '',
        category_id: '',
    });

    const submit = (e) => {
        e.preventDefault();
        post(route('provider.store'));
        reset();
    };

    return (
        <section className={className}>
            <header>
                <h2 className="text-lg font-medium text-gray-900 dark:text-gray-100">Buat provider</h2>

                <p className="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Jika sudah memiliki akun, masukan email akun dan jika belum memiliki akun, buat akun terlebih dahulu pada form diatas
                </p>
            </header>

            <form onSubmit={submit} className="mt-6 space-y-6">
                <div>
                    <InputLabel htmlFor="name" value="Nama Provider" />

                    <TextInput
                        id="name"
                        className="mt-1 block w-full"
                        value={data.name}
                        onChange={(e) => setData('name', e.target.value)}
                        required
                        isFocused
                    />

                    <InputError className="mt-2" message={errors.name} />
                </div>

                <div>
                    <InputLabel htmlFor="address" value="Alamat" />

                    <TextInput
                        isTextArea={true}
                        id="address"
                        type="text"
                        className="mt-1 block w-full"
                        value={data.address}
                        onChange={(e) => setData('address', e.target.value)}
                        required
                    />

                    <InputError className="mt-2" message={errors.address} />
                </div>

                <div>
                    <InputLabel htmlFor="password" value="Email akun" />

                    <TextInput
                        id="email"
                        type="email"
                        className="mt-1 block w-full"
                        value={data.email}
                        onChange={(e) => setData('email', e.target.value)}
                        required
                    />

                    <InputError className="mt-2" message={errors.email} />
                </div>

                <div>
                    <InputLabel htmlFor="category_id" value="Kategori" />

                    <Select
                        id="category_id"
                        name="category_id"
                        className="mt-1 block w-full"
                        value={data.category_id}
                        onChange={(e) => setData('category_id', e.target.value)}
                        required
                    >
                        <option value="">Pilih kategori</option>
                        {categories.map((category) => (
                            <option key={category.id} value={category.id}>{category.name}</option>
                        ))}
                    </Select>


                    <InputError className="mt-2" message={errors.category_id} />
                </div>

                <div className="flex items-center gap-4">
                    <PrimaryButton disabled={processing}>Simpan</PrimaryButton>

                    <Transition
                        show={recentlySuccessful}
                        enterFrom="opacity-0"
                        leaveTo="opacity-0"
                        className="transition ease-in-out"
                    >
                        <p className="text-sm text-gray-600 dark:text-gray-400">Tersimpan.</p>
                    </Transition>
                </div>
            </form>
        </section>
    );
}
