$(document).ready(function() {
    const svg = d3.select("svg"),
          width = +svg.attr("width"),
          height = +svg.attr("height");

    const treeLayout = d3.tree()
        .size([width - 200, height - 200]);

    const root = d3.hierarchy({
        name: "CEO",
        children: [{
                name: "CTO",
                children: [
                    { name: "Engineer1" },
                    { name: "Engineer2" }
                ]
            },
            {
                name: "CFO",
                children: [
                    { name: "Accountant1" },
                    { name: "Accountant2" }
                ]
            }
        ]
    });
    console.log(root);
    treeLayout(root);

    const g = svg.append('g')
        .attr('transform', 'translate(100,100)');

    g.selectAll(".link")
        .data(root.links())
        .join("line")
        .classed("link", true)
        .attr("stroke", "#ADADAD")
        .attr("x1", d => d.source.x)
        .attr("y1", d => d.source.y)
        .attr("x2", d => d.target.x)
        .attr("y2", d => d.target.y);

    g.selectAll(".node")
        .data(root.descendants())
        .join("circle")
        .classed("node", true)
        .attr("r", 10)
        .attr("cx", d => d.x)
        .attr("cy", d => d.y)
        .attr("fill", "#4287f5");

    g.selectAll(".label")
        .data(root.descendants())
        .join("text")
        .classed("label", true)
        .attr("x", d => d.x + 15)
        .attr("y", d => d.y)
        .text(d => d.data.name);

    // Usar jQuery para añadir interactividad
    $("#changeColor").click(function() {
        $(".node").css("fill", "red");
    });
});
