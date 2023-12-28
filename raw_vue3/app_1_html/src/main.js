const { createApp } = Vue;

const template = `
    <div>
        <h1>Counter</h1>
        <button @click="count++" class="cursor-pointer px-4 py-1 bg-green-700 text-white">{{ count }}</button>
    </div>
`;

const data = () => {
    return {
        count: 0,
    };
}

createApp({data, template}).mount('#app');