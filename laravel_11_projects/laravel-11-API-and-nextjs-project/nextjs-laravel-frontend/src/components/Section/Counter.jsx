import React from 'react';

const Counter = ({about,classname}) => {
    return (
<div className='container bg-slate-100 rounded-md pt-8'>
    <div className={` counter-block ${classname} `}>
        <div className='grid xl:grid-cols-4 grid-cols-2 gap-y-8'>

        <div className='item'>
            <div className='flex flex-col items-center'>
                <div className='count-block flex items-center'>
       <div className='counter heading3'> {about.setup_growth} </div>
                    <span className='heading3'>k</span>  
                </div>
                <div className='body1 text-secondary text-center'>
                Business Setup Growth
                </div> 
            </div> 
        </div>

        <div className='item'>
            <div className='flex flex-col items-center'>
                <div className='count-block flex items-center'>
                    <div className='counter heading3'> {about.passive_income} </div>
                    <span className='heading3'>k</span>  
                </div>
                <div className='body1 text-secondary text-center'>
                Business Passive Income
                </div> 
            </div> 
        </div>

        <div className='item'>
            <div className='flex flex-col items-center'>
                <div className='count-block flex items-center'>
    <div className='counter heading3'> {about.problem_solving } </div>
                    <span className='heading3'>k</span>  
                </div>
                <div className='body1 text-secondary text-center'>
                Business Problem Solving 
                </div> 
            </div> 
        </div>


        <div className='item'>
            <div className='flex flex-col items-center'>
                <div className='count-block flex items-center'>
                    <div className='counter heading3'> {about.goal_achiever} </div>
                    <span className='heading3'>k</span>  
                </div>
                <div className='body1 text-secondary text-center'>
                Business Goal Achivever
                </div> 
            </div> 
        </div>

        </div>

    </div>
    
</div>
    );
};

export default Counter;