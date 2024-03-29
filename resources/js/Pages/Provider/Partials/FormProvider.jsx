import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Link, useForm, usePage } from '@inertiajs/react';
import { Transition } from '@headlessui/react';
import Select from '@/Components/Select';

export default function FormProvider({ className = '', categories, ...props }) {
    const { data, setData, post, put, errors, hasErrors, reset, processing, recentlySuccessful } = useForm({
        name: props.provider?.name || '',
        email: props.provider?.user.email || '',
        password: '',
        address: props.provider?.address || '',
        category_id: props.provider?.category_id || '',
    });

    const submit = (e) => {
        e.preventDefault();
        if (props.isUpdate) {
            console.log(props.provider.id);
            put(route('provider.update', props.provider.id));
        } else {
            post(route('provider.store'));
            hasErrors ? reset('password') : reset();
        }
    };

    return (
        <section className={className}>
            <header>
                <h2 className="text-lg font-medium text-gray-900 dark:text-gray-100">{props.isUpdate ? 'Edit provider' : 'Buat provider'}</h2>

                <p className="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {props.isUpdate ? 'Edit provider' : 'Mohon isi form berikut untuk membuat provider baru.'}
                </p>
            </header>

            <form onSubmit={submit} className="mt-6 space-y-6">
                <div className='grid md:grid-cols-2 gap-5'>
                    <div>
                        <InputLabel htmlFor="name" value="Nama" />

                        <TextInput
                            id="name"
                            className="mt-1 block w-full"
                            value={data.name}
                            onChange={(e) => setData('name', e.target.value)}
                            required
                            isFocused
                            autoComplete="name"
                        />

                        <InputError className="mt-2" message={errors.name} />
                    </div>

                    <div>
                        <InputLabel htmlFor="email" value="Email" />

                        <TextInput
                            id="email"
                            type="email"
                            className="mt-1 block w-full"
                            value={data.email}
                            onChange={(e) => setData('email', e.target.value)}
                            required
                            autoComplete="email"
                        />

                        <InputError className="mt-2" message={errors.email} />
                    </div>

                    {!props.isUpdate && (
                        <div>
                            <InputLabel htmlFor="password" value="Password" />

                            <TextInput
                                id="password"
                                type="password"
                                className="mt-1 block w-full"
                                value={data.password}
                                onChange={(e) => setData('password', e.target.value)}
                                required
                            />

                            <InputError className="mt-2" message={errors.password} />
                        </div>
                    )}

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
