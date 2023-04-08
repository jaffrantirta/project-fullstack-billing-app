import { forwardRef, useEffect, useRef } from 'react';

export default forwardRef(function TextInput({ type = 'text', className = '', isFocused = false, isTextArea = false, ...props }, ref) {
    const input = ref ? ref : useRef();

    useEffect(() => {
        if (isFocused) {
            input.current.focus();
        }
    }, []);

    return (!isTextArea ?
        <input
            {...props}
            type={type}
            className={
                'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-primary dark:focus:border-dark-primary focus:ring-primary dark:focus:ring-dark-primary rounded-md shadow-sm ' +
                className
            }
            ref={input}
        /> :
        <textarea
            {...props}
            className={
                'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-primary dark:focus:border-dark-primary focus:ring-primary dark:focus:ring-dark-primary rounded-md shadow-sm ' +
                className
            }
            ref={input}
        />
    );
});
