import React from 'react'

export default function Table({ className, children, ...props }) {
    return (
        <table {...props} className={`w-full rounded-3xl bg-white dark:bg-slate-800 dark:text-slate-200 ${className}`}>
            {children}
        </table>
    )
}
