import React from 'react'

export default function index(props) {
    console.log(props.auth.user.roles.some(role => role.name === 'super-admin'));
    return (
        <div>index</div>
    )
}
